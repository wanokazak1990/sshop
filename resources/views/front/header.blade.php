<div class="container-fluid header" >
	<div class="row top">
		<div class="container ">
			<div class="row">
				<div class="col-7">
					<ul class="nav nav-pills  about-menu">
					  <li class="nav-item">
					    <a class="nav-link" href="#">О нас</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Доставка</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Оплата</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Анонимность</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Контакты</a>
					  </li>
					</ul>
				</div>

				<div class="col-5 text-right" >
					<ul class="nav nav-pills float-right auth-menu">
					  @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container py-4">
			<div class="row d-flex align-items-center">
				<div class="col-3 logo">
					<img src="{{asset('storage/logo/logo.png')}}">
				</div>

				<div class="col-5">
					<div class="h1 m-0">8 (800) 222-04-18</div>

					<div class="">Пнд-Вск с 09:00 до 18:00 по МСК</div>
				</div>

				<div class="col-4">

				</div>
			</div>
		</div>
	</div>	
</div>