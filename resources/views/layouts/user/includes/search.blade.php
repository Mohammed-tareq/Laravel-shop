<div class="bg-light top-header">
	<div class="container">
		<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
			<div class="col-lg-4 logo">
				<a href="index.php" class="text-decoration-none">
					<span class="h1 text-uppercase text-primary bg-dark px-2">Online</span>
					<span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SHOP</span>
				</a>
			</div>
			<div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
				<a href="account.php" class="nav-link text-dark">My Account</a>
				<form action="">
					<div class="input-group">

                        <input type="text" placeholder="Search For Products" value="{{ Request::get('keyword') }}" name="keyword" class="form-control">
						<span class="input-group-text">
                            <button type="submit" class="btn text-center">
							<i class="fa fa-search"></i>
                            </button>
					  	</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>