<template>
	<nav class="navbar" role="navigation" aria-label="main navigation">
	  <div class="navbar-brand">
	    <a class="navbar-item" href="https://atiqullah-naemi.github.io/Naemi.Dev/">
	      xyzCollege
	    </a>
		
		<div class="navbar-menu is-active">
			<router-link to="/student" class="navbar-item">Students</router-link>
    		<router-link to="/course" class="navbar-item">Courses</router-link>
		</div>

	    <button class="button navbar-burger">
	      <span></span>
	      <span></span>
	      <span></span>
	    </button>
	  </div>
	</nav>
</template>