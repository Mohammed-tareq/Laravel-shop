<header class="bg-dark">
	<div class="container">
		<nav class="navbar navbar-expand-xl" id="navbar">
			<a href="index.php" class="text-decoration-none mobile-logo">
				<span class="h2 text-uppercase text-primary bg-dark">Online</span>
				<span class="h2 text-uppercase text-white px-2">SHOP</span>
			</a>
			<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<!-- <span class="navbar-toggler-icon icon-menu"></span> -->
				  <i class="navbar-toggler-icon fas fa-bars"></i>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop All Departments</button>
                    <div class="dropdown-content">
                        @foreach ( $categories as $category )

                        <ul>
                            <li>
                                <a href="#" class="dropdown-item">{{ $category->name }}</a>
                                <div class="sub-menu">
                                    <div>
                                        <ul>
                                            @foreach ($category->subcategory as $s)
                                            <li><a href="#" class="dropdown-item">{{ $s->name }}</a></li>
                                            @endforeach

                                    </ul>
                                    </div>

                                </div>
                            </li>
                        </ul>
                        @endforeach

                    </div>
                </div>

      		</div>
			<div class="right-nav py-0">
				<a href="cart.php" class="ml-3 d-flex pt-2">
					<i class="fas fa-shopping-cart text-primary"></i>
				</a>
			</div>
      	</nav>
  	</div>
</header>