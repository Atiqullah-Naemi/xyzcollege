<template>
	<div class="modal" :class='openModal'>
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">
	      	{{ list.name }} Course Details
	      </p>
	      <button class="delete" aria-label="close" @click='close'></button>
	    </header>
	    <section class="modal-card-body">

			<li class="panel-block"><label class="column is-4"><strong>Course Name</strong></label>
				{{ list.name }}
			</li>

			<li class="panel-block"><label class="column is-4"><strong>Course Duration</strong></label>
				{{ list.duration }}
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