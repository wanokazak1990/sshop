<!-- <nav class="navbar navbar-expand-lg navbar-light" >
	<div class="container">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">

            @foreach ($sectionItems as $itemSection)
                @if(isset($itemSection->children))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $itemSection->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($itemSection->children as $itemChild)

                                <a class="dropdown-item" href="#">{{ $itemChild->name }}</a>

                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">-{{ $itemSection->name }}</a>
                    </li>
                @endif

            @endforeach
	    </ul>

	    <ul class="navbar-nav ml-auto">

		    <li class="nav-item">
		        <a class="nav-link" href="#">Акции</a>
		    </li>
		    <li class="nav-item rose">
		        <a class="nav-link" href="#">Скидки</a>
		    </li>
		    <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Информация
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		    </li>
	  	</ul>

	  </div>
	</div>
</nav>


 -->


<nav class="container">
  <ul class="top-menu">
    <li><a href="">Главная</a></li>
    <li class="dropdown-standart"><a href="" class="dropdown">Страницы</a>
      <ul class="submenu-standart">
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
      </ul>
    </li>
    <li><a href="" class="dropdown">Магазин</a>
      <ul class="submenu">
        
        	<div class="row">
        		<div class="col-4">
        			1
        		</div>
        		<div class="col-4">
        			2
        		</div>
        		<div class="col-4">
        			3
        		</div>
        		<div class="col-4">
        			4
        		</div>
        		<div class="col-4">
        			5
        		</div>
        		<div class="col-4">
        			6
        		</div>
        		<div class="col-4">
        			7
        		</div>
        		<div class="col-4">
        			8
        		</div>
        		<div class="col-4">
        			9
        		</div>
        	</div>
      </ul>
    </li>
    <li><a href="">Портфолио</a></li>
    <li><a href="">Блог</a></li>
  </ul>
</nav>