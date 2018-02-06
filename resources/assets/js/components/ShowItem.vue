<template>
	<div class="modal" :class='openModal'>
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">
	      	{{ list.firstname }}'s Details
	      </p>
	      <button class="delete" aria-label="close" @click='close'></button>
	    </header>
	    <section class="modal-card-body">

			<li class="panel-block"><label class="column is-2"><strong>First Name</strong></label>
				{{ list.firstname }}
			</li>

			<li class="panel-block"><label class="column is-2"><strong>Phone</strong></label>
				{{ list.phone }}
			</li>

			<li class="panel-block"><label class="column is-2"><strong>Email</strong></label>
				{{ list.email }}
			</li>

	    </section>
	    <footer class="modal-card-foot">
	      <button class="button" @click='close'>Close</button>
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
				list: ''
			}
		},

		methods:
		{
			close() {
				this.$emit('closeRequest')
			}
		}
	}

</script>