{{--  @if ($auth_role=='Administrator')  --}}
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
        <!-- setting -->
		<li>
			<a href="{{base_url('user/change/')}}">{{--$auth_id--}}
				<i class="material-icons text-warning">settings</i>
				<span>Setting</span>
			</a>
		</li>
        <!-- /setting -->
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


{{--  @elseif ($auth_role=='User')  --}}

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
				<i class="material-icons text-success">tv</i>				
				<span>Screen</span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{base_url('router/interface')}}">
						<span>Interface</span>
					</a>
				</li>
				<li>
					<a href="{{base_url('router/quee')}}">
						<span>Limitasi</span>
					</a>
				</li>
				<li>
					<a href="{{base_url('router/firewall_list')}}">
						<span>Customer List</span>
					</a>
				</li>				
			</ul>
		</li>
		<!-- /apps -->	 
		<!-- apps -->
		<li>
			<a href="javascript:;">
				<span class="menu-caret">
					<i class="material-icons">arrow_drop_down</i>
				</span>
				<i class="material-icons text-success">slideshow</i>				
				<span>Content</span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="{{base_url('router/interface')}}">
						<span>Interface</span>
					</a>
				</li>
				<li>
					<a href="{{base_url('router/quee')}}">
						<span>Limitasi</span>
					</a>
				</li>
				<li>
					<a href="{{base_url('router/firewall_list')}}">
						<span>Customer List</span>
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
{{--  @endif  --}}