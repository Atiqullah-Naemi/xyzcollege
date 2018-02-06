<template>
	<div class="modal" :class='openModal'>
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Add New Student</p>
	      <button class="delete" aria-label="close" @click='close'></button>
	    </header>
	    <section class="modal-card-body">
	     	<div class="field">
			  <label class="label">First Name</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="First Name" v-model='list.firstname'>
			  </div>
			 <small v-if='errors.firstname' class='has-text-danger'>
			 	{{ errors.firstname[0] }}
			 </small>
			</div>
			<div class="field">
			  <label class="label">Last Name</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Last Name" v-model='list.lastname'>
			  </div>
			 <small v-if='errors.lastname' class='has-text-danger'>
			 	{{ errors.lastname[0] }}
			 </small>
			</div>
			<div class="field">
			  <label class="label">Phone Number</label>
			  <div class="control">
			    <input class="input" type="number" placeholder="Phone Number" v-model='list.phone'>
			  </div>
			  <small v-if='errors.phone' class='has-text-danger'>
			 	{{ errors.phone[0] }}
			 </small>
			</div>
			<div class="field">
			  <label class="label">Email</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Email" v-model='list.email'>
			  </div>
			  <small v-if='errors.email' class='has-text-danger'>
			 	{{ errors.email[0] }}
			 </small>
			</div>
			<div class="field">
			  <label class="label">Date of Birth</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Date of Birth" v-model='list.date_of_birth'>
			  </div>
			  <small v-if='errors.date_of_birth' class='has-text-danger'>
			 	{{ errors.date_of_birth[0] }}
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
					firstname: '',
					lastname: '',
					phone: '',
					email: '',
					date_of_birth: ''
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
				axios.post('/student', this.$data.list)
				.then((response) => {
					this.close()
					this.$parent.push(response.data)
				})
				.catch((error) => this.errors = error.response.data)
			}
		}
	}

</script>