<template>
	<div class="modal" :class='openModal'>
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Add New Course</p>
	      <button class="delete" aria-label="close" @click='close'></button>
	    </header>
	    <section class="modal-card-body">
	     	<div class="field">
			  <label class="label">Course Name</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Course Name" v-model='list.name'>
			  </div>
			 <small v-if='errors.name' class='has-text-danger'>
			 	{{ errors.name[0] }}
			 </small>
			</div>
			<div class="field">
			  <label class="label">Duration</label>
			  <div class="control">
			    <input class="input" type="number" placeholder="Duration" v-model='list.duration'>
			  </div>
			  <small v-if='errors.duration' class='has-text-danger'>
			 	{{ errors.duration[0] }}
			 </small>
			</div>
	    </section>
	    <footer class="modal-card-foot">
	      <button class="button is-success" @click='saveItem'>Save changes</button>
	      <button class="button" @click='close'>Cancel</button>
	    </footer>
	  </div>
	</div>
</template>

<script>
	
	export default
	{
		props: ['openModal'],

		data()
		{
			return {
				list: {
					name: '',
					duration: ''
				},
				errors: {}
			}
		},

		methods:
		{
			close() {
				this.$emit('closeRequest');
			},

			saveItem() {
				axios.post('/course', this.$data.list)
				.then((response) => {
					this.close()
					this.$parent.push(response.data)
				})
				.catch((error) => this.errors = error.response.data)
			}
		}
	}

</script>