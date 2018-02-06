<template>
	
	<div>
		<nav class="panel column is-offset-2 is-8">
		  <p class="panel-heading">
		    xyzCollege <button class="button is-link is-outlined" @click="addNewItem">
		      Add New Course
		    </button>
		  </p>

		  <a class="panel-block" v-for='item, key in lists'>
		  	<span class="column is-9">
		  		{{ item.name }}
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

		<AddCourse :openModal='addActive' @closeRequest='close'></AddCourse>
		<ShowCourse :openModal='showActive' @closeRequest='close'></ShowCourse>
		<UpdateCourse :openModal='updateActive' @closeRequest='close'></UpdateCourse>
	</div>


</template>

<script>
	
	let AddCourse = require('./AddCourse.vue');
	let ShowCourse = require('./ShowCourse.vue');
	let UpdateCourse = require('./UpdateCourse.vue');

	export default
	{
		components: { AddCourse, ShowCourse, UpdateCourse },

		data() {
			return {
				addActive: '',
				showActive: '',
				updateActive: '',
				lists: {},
				errors: {}
			}
		},

		mounted() {
			axios.post('/getCourse')
			.then((response) => this.lists = response.data)
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
					axios.delete(`/course/${id}`)
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