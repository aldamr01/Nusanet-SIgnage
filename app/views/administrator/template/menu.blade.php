@if ($thisuser['auth_role']=='Administrator')
<!-- main navigation -->
<nav>
	<p class="nav-title">NAVIGATION</p>
	<ul class="nav">
		<!-- dashboard -->
		<li>
			<a href="{{base_url()}}">
				<i class="material-icons text-primary">home</i>
				<span>Home</span>
			</a>
		</li>
		<!-- /dashboard -->
		<!-- apps -->
		<li>
			<a href="javascript:;">
				<span class="menu-caret">
					<i class="material-icons">arrow_drop_down</i>
				</span>
				<i class="material-icons text-success">map</i>				
				<span>Site</span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{base_url('site/list')}}">
						<span>List Site</span>
					</a>
				</li>
				<li>
					<a href="{{base_url('site/create')}}">
						<span>New Site</span>
					</a>
				</li>							
			</ul>
		</li>
		<!-- /apps -->		       
        <!-- Logout -->
		<li>
			<a href="{{base_url('Logoff')}}">
				<i class="material-icons text-danger">exit_to_app</i>
				<span>Logout</span>
			</a>
		</li>
		<!-- /Logout -->
	</ul>
</nav>
<!-- /main navigation -->


@elseif ($thisuser['auth_role']=='User')

<!-- main navigation -->
<nav>
	<p class="nav-title">NAVIGATION</p>
	<ul class="nav">
		<!-- dashboard -->
		<li>
			<a href="{{base_url()}}">
				<i class="material-icons text-warning">map</i>
				<span>Home</span>
			</a>
		</li>
		<!-- /dashboard -->		      
        <!-- Logout -->
		<li>
			<a onclick="return confirm('do you want to logoff now ?')" href="{{base_url('Logoff')}}">
				<i class="material-icons text-danger">exit_to_app</i>
				<span>Logout</span>
			</a>
		</li>
		<!-- /Logout -->
	</ul>
</nav>
<!-- /main navigation -->
@endif