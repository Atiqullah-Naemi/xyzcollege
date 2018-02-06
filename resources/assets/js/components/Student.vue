<template>
	
	<div>
		<nav class="panel column is-offset-2 is-8">
		  <p class="panel-heading">
		    xyzCollege <button class="button is-link is-outlined" @click="addNewItem">
		      Add New Student
		    </button>
		  </p>
		  <div class="panel-block">
		    <p class="control has-icons-left">
		      <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
		      <span class="icon is-small is-left">
		        <i class="fa fa-search"></i>
		      </span>
		    </p>
		  </div>

		  <a class="panel-block" v-for='item, key in temp'>
		  	<span class="column is-9">
		  		{{ item.firstname }}
		  	</span>
		    
		    <span class="panel-icon column is-1">
		     	<i class="has-text-danger fa fa-minus-circle" @click='deleteItem(key, item.id)'></i>
		    </span>
		    <span class="panel-icon column is-1">
		     	<i class="has-text-info fa fa-edit" @click='updateItem(key)'></i>
		    </span>
		    <span class="panel-icon column is-1">
		     	<i class="has-text-primary fa fa-eye" @click='showItem(key)'></i>
		    </span>
		  </a>

		</nav>

		<AddStudent :openModal='addActive' @closeRequest='close'></AddStudent>
		<ShowItem :openModal='showActive' @closeRequest='close'></ShowItem>
		<UpdateStudent :openModal='updateActive' @closeRequest='close'></UpdateStudent>
	</div>


</template>

<script>
	
	let AddStudent = require('./AddStudent.vue');
	let ShowItem = require('./ShowItem.vue');
	let UpdateStudent = require('./UpdateStudent.vue');

	export default
	{
		components: { AddStudent, ShowItem, UpdateStudent },

		data() {
			return {
				addActive: '',
				showActive: '',
				updateActive: '',
				lists: {},
				errors: {},
				searchQuery: '',
				temp: ''
			}
		},

		watch:
		{
			searchQuery() {
				if (this.searchQuery.length > 1) {
					this.temp = this.lists.filter((item) => {
						return item.firstname.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
					});

					// console.log(result);
				} else {
					this.temp = this.lists
				}
			}
		},

		mounted() {
			axios.post('/getData')
			.then((response) => this.lists = this.temp = response.data)
			.catch((error) => this.errors = error.response.data)
		},

		methods:
		{
			addNewItem() {
				this.addActive = 'is-active';
			},

			showItem(key) {
				this.$children[1].list = this.lists[key]
				this.showActive = 'is-active';
			},

			updateItem(key) {
				this.$children[2].list = this.lists[key]
				this.updateActive = 'is-active';
			},

			deleteItem(key, id) {
				if (confirm('Are you sure to delete this?')) {
					console.log(`${id} ${key}`);
					axios.delete(`/student/${id}`)
					.then((response) => {
						this.lists.splice(key, 1);
					})
					.catch((error) => this.errors = error.response.data)
				}
			},

			close() {
				this.addActive = this.showActive = this.updateActive = ''
			}
		}
	}

</script>