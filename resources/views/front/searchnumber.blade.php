<div class="container">
	<div class="row">
		<div class="col ">
			<div style="background: repeating-linear-gradient(
  45deg,
  #ff5c77,
  #ff5c77 10px,
  #ff294d 10px,
  #ff294d 20px
); border-radius: 5px 5px 0 0; " class="p-3">
				
				<form method="GET" action="{{route('view.search')}}">
				<div class="input-group">
			        
			        <input 
			        	type="text" 
			        	style="color:#660000;background: linear-gradient(to right, rgba(255,255,255,0.9),rgba(255,255,255,0.4));border:0px;" class="form-control form-control-lg" 
			        	placeholder="Поиск по каталожному номеру"
			        	name="articule"
			        	value="{{isset(request()->articule)?request()->articule:''}}" 
			        >

			        <span class="input-group-btn ">
			          	<input type="submit" class="btn btn-dark  btn-lg" style="border-radius: 0 5px 5px  0; " value="Найти">
			        </span>

				</div>
				</form>

			</div>
		</div>
	</div>
</div>

<?php 
echo '0' == '';