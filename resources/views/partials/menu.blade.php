<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tutorials<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('starter') }}">Quick Start</a></li>
        <li><a href="{{ url('service') }}">DataTables as a Service</a></li>
    </ul>
</li>


<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eloquent<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="{!! url('eloquent/basic') !!}" class="{!! Request::is('eloquent/basic') ? 'active' : '' !!}">Basic</a></li>
		<li><a href="{!! url('eloquent/basic-columns') !!}" class="{!! Request::is('eloquent/basic-columns') ? 'active' : '' !!}">Basic with Column Definition</a></li>
		<li><a href="{!! url('eloquent/basic-object') !!}" class="{!! Request::is('eloquent/basic-object') ? 'active' : '' !!}">Object Data Source</a></li>
		<li><a href="{!! url('eloquent/row-details') !!}" class="{!! Request::is('eloquent/row-details') ? 'active' : '' !!}">Row Details</a></li>
		<li><a href="{!! url('eloquent/master') !!}" class="{!! Request::is('eloquent/master') ? 'active' : '' !!}">Master-Details Table</a></li>
		<li><a href="{!! url('eloquent/count') !!}" class="{!! Request::is('eloquent/count') ? 'active' : '' !!}">Count Alias</a></li>
		<li><a href="{!! url('eloquent/multi-filter-select') !!}" class="{!! Request::is('eloquent/multi-filter-select') ? 'active' : '' !!}">Column Search</a></li>
		<li><a href="{!! url('eloquent/post-column-search') !!}" class="{!! Request::is('eloquent/post-column-search') ? 'active' : '' !!}"><strong style="color: red">[UPDATED]</strong> Filter Column Search [via POST]</a></li>
		<li><a href="{!! url('eloquent/add-edit-remove-column') !!}" class="{!! Request::is('eloquent/add-edit-remove-column') ? 'active' : '' !!}">Add/Edit/Remove Column</a></li>
		<li><a href="{!! url('eloquent/dt-row') !!}" class="{!! Request::is('eloquent/dt-row') ? 'active' : '' !!}">DT Row Option</a></li>
		<li><a href="{!! url('eloquent/row-num') !!}" class="{!! Request::is('eloquent/row-num') ? 'active' : '' !!}">MySQL Row Num</a></li>
		<li><a href="{!! url('eloquent/custom-filter') !!}" class="{!! Request::is('eloquent/custom-filter') ? 'active' : '' !!}">Overriding Global Filter</a></li>
		<li><a href="{!! url('eloquent/advance-filter') !!}" class="{!! Request::is('eloquent/advance-filter') ? 'active' : '' !!}">Advance Global Filter [v5.1++]</a></li>
		<li><a href="{!! url('eloquent/transformer') !!}" class="{!! Request::is('eloquent/transformer') ? 'active' : '' !!}">Fractal Transformer [v5.1++]</a></li>
		<li><a href="{!! url('eloquent/carbon') !!}" class="{!! Request::is('eloquent/carbon') ? 'active' : '' !!}">DateTime/Carbon Objects</a></li>
		<li><a href="{!! url('eloquent/relationships') !!}" class="{!! Request::is('eloquent/relationships') ? 'active' : '' !!}">Eager Loading</a></li>
		<li><a href="{!! url('eloquent/has-many') !!}" class="{!! Request::is('eloquent/has-many') ? 'active' : '' !!}">HasMany Relationship</a></li>
		<li><a href="{!! url('eloquent/joins') !!}" class="{!! Request::is('eloquent/joins') ? 'active' : '' !!}">Join Queries</a></li>
		<li><a href="{!! url('eloquent/ioc') !!}" class="{!! Request::is('eloquent/ioc') ? 'active' : '' !!}">IOC Container [v5.2++]</a></li>
		<li><a href="{!! url('eloquent/blacklist') !!}" class="{!! Request::is('eloquent/blacklist') ? 'active' : '' !!}"><strong style="color: red">[NEW]</strong> Blacklist Columns [v6.9++]</a></li>
		<li><a href="{!! url('eloquent/whitelist') !!}" class="{!! Request::is('eloquent/whitelist') ? 'active' : '' !!}"><strong style="color: red">[NEW]</strong> Whitelist Columns [v6.9++]</a></li>
		<li class="divider"></li>
		<li><a href="{!! url('eloquent') !!}" class="{!! Request::is('eloquent') ? 'active' : '' !!}"><i class="glyphicon glyphicon-book"></i> Eloquent ORM Notes</a></li>
	</ul>
</li>

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Query Builder<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="{!! url('fluent/basic') !!}" class="{!! Request::is('fluent/basic') ? 'active' : '' !!}">Basic</a></li>
		<li><a href="{!! url('fluent/basic-object') !!}" class="{!! Request::is('fluent/basic-object') ? 'active' : '' !!}">Object Data Source</a></li>
		<li><a href="{!! url('fluent/union') !!}" class="{!! Request::is('fluent/union') ? 'active' : '' !!}">Union Queries</a></li>
		<li><a href="{!! url('fluent/multi-filter-select') !!}" class="{!! Request::is('fluent/multi-filter-select') ? 'active' : '' !!}">Column Search</a></li>
		<li><a href="{!! url('fluent/advance-filter') !!}" class="{!! Request::is('eloquent/advance-filter') ? 'active' : '' !!}">Advance Global Filter [v5.1++]</a></li>
		<li><a href="{!! url('fluent/add-edit-remove-column') !!}" class="{!! Request::is('fluent/add-edit-remove-column') ? 'active' : '' !!}">Add/Edit/Remove Column</a></li>
		<li><a href="{!! url('fluent/dt-row') !!}" class="{!! Request::is('fluent/dt-row') ? 'active' : '' !!}">DT Row Option</a></li>
		<li><a href="{!! url('fluent/custom-filter') !!}" class="{!! Request::is('fluent/custom-filter') ? 'active' : '' !!}">Custom Filter</a></li>
		<li><a href="{!! url('fluent/carbon') !!}" class="{!! Request::is('fluent/carbon') ? 'active' : '' !!}">DateTime/Carbon Objects</a></li>
		<li><a href="{!! url('fluent/joins') !!}" class="{!! Request::is('fluent/joins') ? 'active' : '' !!}">Join Queries</a></li>
		<li><a href="{!! url('fluent/ioc') !!}" class="{!! Request::is('fluent/ioc') ? 'active' : '' !!}">IOC Container [v5.2++]</a></li>
		<li class="divider"></li>
		<li><a href="{!! url('fluent') !!}" class="{!! Request::is('fluent') ? 'active' : '' !!}"><i class="glyphicon glyphicon-book"></i> Fluent Query Builder Notes</a></li>
	</ul>
</li>

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Collection<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="{!! url('collection/array') !!}" class="{!! Request::is('collection/array') ? 'active' : '' !!}">Collection of Array Data Source</a></li>
		<li><a href="{!! url('collection/object') !!}" class="{!! Request::is('collection/object') ? 'active' : '' !!}">Collection of Object Data Source</a></li>
		<li><a href="{!! url('collection/github') !!}" class="{!! Request::is('collection/github') ? 'active' : '' !!}">Github API Data Source</a></li>
		<li><a href="{!! url('collection/basic') !!}" class="{!! Request::is('collection/basic') ? 'active' : '' !!}">Basic</a></li>
		<li><a href="{!! url('collection/basic-object') !!}" class="{!! Request::is('collection/basic-object') ? 'active' : '' !!}">Object Data Source</a></li>
		<li><a href="{!! url('collection/multi-filter-select') !!}" class="{!! Request::is('collection/multi-filter-select') ? 'active' : '' !!}">Column Search</a></li>
		<li><a href="{!! url('collection/add-edit-remove-column') !!}" class="{!! Request::is('collection/add-edit-remove-column') ? 'active' : '' !!}">Add/Edit/Remove Column</a></li>
		<li><a href="{!! url('collection/dt-row') !!}" class="{!! Request::is('collection/dt-row') ? 'active' : '' !!}">DT Row Option</a></li>
		<li><a href="{!! url('collection/custom-filter') !!}" class="{!! Request::is('collection/custom-filter') ? 'active' : '' !!}">Custom Filter</a></li>
		<li><a href="{!! url('collection/carbon') !!}" class="{!! Request::is('collection/carbon') ? 'active' : '' !!}">DateTime/Carbon Objects</a></li>
		<li><a href="{!! url('collection/ioc') !!}" class="{!! Request::is('collection/ioc') ? 'active' : '' !!}">IOC Container [v5.2++]</a></li>
		<li class="divider"></li>
		<li><a href="{!! url('collection') !!}" class="{!! Request::is('collection') ? 'active' : '' !!}"><i class="glyphicon glyphicon-book"></i> Collection Engine Notes</a></li>
	</ul>
</li>

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Html Builder<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="{!! url('html/basic') !!}" class="{!! Request::is('html/basic') ? 'active' : '' !!}">Html Builder via Dependency Injection</a></li>
		<li><a href="{!! url('html/method') !!}" class="{!! Request::is('html/method') ? 'active' : '' !!}">Html Builder via Method Injection</a></li>
		<li><a href="{!! url('html/columns') !!}" class="{!! Request::is('html/columns') ? 'active' : '' !!}">Html Builder with Plain Columns</a></li>
		<li class="divider"></li>
		<li><a href="{!! url('html') !!}" class="{!! Request::is('html') ? 'active' : '' !!}"><i class="glyphicon glyphicon-book"></i> Html Builder Notes</a></li>
	</ul>
</li>

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Service Implementation<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="{!! url('services/basic') !!}" class="{!! Request::is('services/basic') ? 'active' : '' !!}">Basic Implementation</a></li>
		<li><a href="{!! url('services/scope') !!}" class="{!! Request::is('services/scope') ? 'active' : '' !!}">DataTables Scoping</a></li>
	</ul>
</li>

<li><a href="http://yajra.github.io/laravel-datatables/api/">API</a></li>
<li><a href="https://github.com/yajra/laravel-datatables">Github</a></li>

