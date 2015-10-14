@extends((\Config::get('menu.extend_view') ? \Config::get('menu.extend_view') : 'menu::app'))

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Shivergard\Menu</div>
				<div class="panel-body">
					menu
				</div>
			</div>
		</div>
	</div>
</div>
@endsection