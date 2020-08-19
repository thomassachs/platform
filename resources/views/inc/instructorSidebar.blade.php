<!-- Left Sidebar Start -->
	<nav class="vertical_nav">
		<div class="left_section menu_left" id="js-menu" >
			<div class="left_section">
				<ul>
					<li class="menu--item">
						<a href="{{ url('instructor') }}" class="menu--link {{ \Request::is('instructor') ? 'active' : ''}}" title="Dashboard">
							<i class="uil uil-apps menu--icon"></i>
							<span class="menu--label">Dashboard</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/mycourses') }}" class="menu--link {{ \Request::is('instructor/mycourses') ? 'active' : ''}}" title="Courses">
							<i class='uil uil-book-alt menu--icon'></i>
							<span class="menu--label">My Courses</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/createcourse') }}" class="menu--link {{ \Request::is('instructor/createcourse') ? 'active' : ''}}" title="Create Course">
							<i class='uil uil-plus-circle menu--icon'></i>
							<span class="menu--label">Create Course</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/analytics') }}" class="menu--link {{ \Request::is('instructor/analytics') ? 'active' : ''}}" title="Analyics">
							<i class='uil uil-analysis menu--icon'></i>
							<span class="menu--label">Analytics</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/reviews') }}" class="menu--link {{ \Request::is('instructor/reviews') ? 'active' : ''}}" title="Reviews">
						  <i class='uil uil-star menu--icon'></i>
						  <span class="menu--label">Reviews</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/earning') }}" class="menu--link {{ \Request::is('instructor/earning') ? 'active' : ''}}" title="Earning">
						  <i class='uil uil-dollar-sign menu--icon'></i>
						  <span class="menu--label">Earning</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/payout') }}" class="menu--link {{ \Request::is('instructor/payout') ? 'active' : ''}}" title="Payout">
						  <i class='uil uil-wallet menu--icon'></i>
						  <span class="menu--label">Payout</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="{{ url('instructor/statements') }}" class="menu--link {{ \Request::is('instructor/statements') ? 'active' : ''}}" title="Statements">
						  <i class='uil uil-file-alt menu--icon'></i>
						  <span class="menu--label">Statements</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="left_section pt-2">
				<ul>
					<li class="menu--item">
						<a href="setting.html" class="menu--link" title="Setting">
							<i class='uil uil-cog menu--icon'></i>
							<span class="menu--label">Setting</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="feedback.html" class="menu--link" title="Send Feedback">
							<i class='uil uil-comment-alt-exclamation menu--icon'></i>
							<span class="menu--label">Send Feedback</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Left Sidebar End -->
