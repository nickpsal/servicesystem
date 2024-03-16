<!-- Content Start -->
<div class="content">
	<!-- Navbar Start -->
	<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
		<a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
			<h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
		</a>
		<a href="#" class="sidebar-toggler flex-shrink-0">
			<i class="fa fa-bars"></i>
		</a>
		<form class="d-none d-md-flex ms-4">
			<input class="form-control bg-dark border-0" type="search" placeholder="Search">
		</form>
		<div class="navbar-nav align-items-center ms-auto">
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<i class="fa fa-bell me-lg-2"></i>
					<span class="d-none d-lg-inline-flex">Notificatin</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
					<a href="#" class="dropdown-item">
						<h6 class="fw-normal mb-0">Profile updated</h6>
						<small>15 minutes ago</small>
					</a>
					<hr class="dropdown-divider">
					<a href="#" class="dropdown-item">
						<h6 class="fw-normal mb-0">New user added</h6>
						<small>15 minutes ago</small>
					</a>
					<hr class="dropdown-divider">
					<a href="#" class="dropdown-item">
						<h6 class="fw-normal mb-0">Password changed</h6>
						<small>15 minutes ago</small>
					</a>
					<hr class="dropdown-divider">
					<a href="#" class="dropdown-item text-center">See all notifications</a>
				</div>
			</div>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img class="rounded-circle me-lg-2" src="<?= ROOT ?>/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
					<span class="d-none d-lg-inline-flex">John Doe</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
					<a href="#" class="dropdown-item">My Profile</a>
					<a href="#" class="dropdown-item">Settings</a>
					<a href="#" class="dropdown-item">Log Out</a>
				</div>
			</div>
		</div>
	</nav>
	<!-- Navbar End -->

	<!-- Recent Sales Start -->
	<div class="container-fluid pt-4 px-4">
		<div class="bg-secondary text-center rounded p-4">
			<div class="d-flex align-items-center justify-content-between mb-4">
				<h6 class="mb-0">Assigned Tickets</h6>
				<a href="">Show All</a>
			</div>
			<div class="table-responsive">
				<table class="table text-start align-middle table-bordered table-hover mb-0">
					<thead>
						<tr class="text-white">
							<th scope="col">Id</th>
							<th scope="col">Client</th>
							<th scope="col">Issue</th>
							<th scope="col">Date Oppened</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01</td>
							<td>Client 1</td>
							<td>Laptop dont open</td>
							<td>15/03/2024</td>
							<td>
								<a class="btn btn-sm btn-primary" href="">Detail</a>
								<a class="btn btn-sm btn-primary" href="">Close</a>
							</td>
						</tr>
						<tr>
							<td>02</td>
							<td>Client 2</td>
							<td>Pc dont boot</td>
							<td>15/03/2024</td>
							<td>
								<a class="btn btn-sm btn-primary" href="">Detail</a>
								<a class="btn btn-sm btn-primary" href="">Close</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Recent Sales End -->