<div class="search-box">
    <input id="search-filter" type="text" name="keyword" placeholder="Search ..">
</div>
<br>
<div class="panel panel-info">
    @include('partials.ads',['slot'=>env('ADS_SLOT'),'format'=>null, 'style'=>'display:inline-block;min-width:237px;max-width:237px;width:100%;height:90px;'])
</div>
<ul class="sidebar-menu-container">
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#tutorials">Tutorials</a>
        <div id="tutorials" class="collapse in collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('starter') ? 'active' : '' !!}" href="{{ url('starter') }}">Quick Start</a></li>
                <li><a class="keyword {!! Request::is('service') ? 'active' : '' !!}" href="{{ url('service') }}">DataTables as a Service</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#eloquent">Eloquent</a>
        <div id="eloquent" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('eloquent/basic') ? 'active' : '' !!}" href="{!! url('eloquent/basic') !!}">Basic</a></li>
                <li><a class="keyword {!! Request::is('eloquent/basic-columns') ? 'active' : '' !!}" href="{!! url('eloquent/basic-columns') !!}">Basic with Column Definition</a></li>
                <li><a class="keyword {!! Request::is('eloquent/basic-object') ? 'active' : '' !!}" href="{!! url('eloquent/basic-object') !!}">Object Data Source</a></li>
                <li><a class="keyword {!! Request::is('eloquent/row-details') ? 'active' : '' !!}" href="{!! url('eloquent/row-details') !!}">Row Details</a></li>
                <li><a class="keyword {!! Request::is('eloquent/master') ? 'active' : '' !!}" href="{!! url('eloquent/master') !!}">Master-Details Table</a></li>
                <li><a class="keyword {!! Request::is('eloquent/count') ? 'active' : '' !!}" href="{!! url('eloquent/count') !!}">Count Alias</a></li>
                <li><a class="keyword {!! Request::is('eloquent/multi-filter-select') ? 'active' : '' !!}" href="{!! url('eloquent/multi-filter-select') !!}">Column Search</a></li>
                <li><a class="keyword {!! Request::is('eloquent/post-column-search') ? 'active' : '' !!}" href="{!! url('eloquent/post-column-search') !!}">Filter Column Search [via POST]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/add-edit-remove-column') ? 'active' : '' !!}" href="{!! url('eloquent/add-edit-remove-column') !!}">Add/Edit/Remove Column</a></li>
                <li><a class="keyword {!! Request::is('eloquent/dt-row') ? 'active' : '' !!}" href="{!! url('eloquent/dt-row') !!}">DT Row Option</a></li>
                <li><a class="keyword {!! Request::is('eloquent/manual-count') ? 'active' : '' !!}" href="{!! url('eloquent/manual-count') !!}">Manual Counting of Records</a></li>
                <li><a class="keyword {!! Request::is('eloquent/row-num') ? 'active' : '' !!}" href="{!! url('eloquent/row-num') !!}">MySQL Row Num</a></li>
                <li><a class="keyword {!! Request::is('eloquent/custom-filter') ? 'active' : '' !!}" href="{!! url('eloquent/custom-filter') !!}">Overriding Global Filter</a></li>
                <li><a class="keyword {!! Request::is('eloquent/advance-filter') ? 'active' : '' !!}" href="{!! url('eloquent/advance-filter') !!}">Advance Global Filter [v5.1++]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/transformer') ? 'active' : '' !!}" href="{!! url('eloquent/transformer') !!}">Fractal Transformer [v5.1++]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/carbon') ? 'active' : '' !!}" href="{!! url('eloquent/carbon') !!}">DateTime/Carbon Objects</a></li>
                <li><a class="keyword {!! Request::is('eloquent/ioc') ? 'active' : '' !!}" href="{!! url('eloquent/ioc') !!}">IOC Container [v5.2++]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/blacklist') ? 'active' : '' !!}" href="{!! url('eloquent/blacklist') !!}">Blacklist Columns [v6.9++]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/whitelist') ? 'active' : '' !!}" href="{!! url('eloquent/whitelist') !!}">Whitelist Columns [v6.9++]</a></li>
                <li><a class="keyword {!! Request::is('eloquent/order-column') ? 'active' : '' !!}" href="{!! url('eloquent/order-column') !!}">Order Column API</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#queryBuilder">Query Builder</a>
        <div id="queryBuilder" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('fluent/basic') ? 'active' : '' !!}" href="{!! url('fluent/basic') !!}">Basic</a></li>
                <li><a class="keyword {!! Request::is('fluent/basic-object') ? 'active' : '' !!}" href="{!! url('fluent/basic-object') !!}">Object Data Source</a></li>
                <li><a class="keyword {!! Request::is('fluent/union') ? 'active' : '' !!}" href="{!! url('fluent/union') !!}">Union Queries</a></li>
                <li><a class="keyword {!! Request::is('fluent/multi-filter-select') ? 'active' : '' !!}" href="{!! url('fluent/multi-filter-select') !!}">Column Search</a></li>
                <li><a class="keyword {!! Request::is('fluent/advance-filter') ? 'active' : '' !!}" href="{!! url('fluent/advance-filter') !!}">Advance Global Filter [v5.1++]</a></li>
                <li><a class="keyword {!! Request::is('fluent/add-edit-remove-column') ? 'active' : '' !!}" href="{!! url('fluent/add-edit-remove-column') !!}">Add/Edit/Remove Column</a></li>
                <li><a class="keyword {!! Request::is('fluent/dt-row') ? 'active' : '' !!}" href="{!! url('fluent/dt-row') !!}">DT Row Option</a></li>
                <li><a class="keyword {!! Request::is('fluent/custom-filter') ? 'active' : '' !!}" href="{!! url('fluent/custom-filter') !!}">Custom Filter</a></li>
                <li><a class="keyword {!! Request::is('fluent/carbon') ? 'active' : '' !!}" href="{!! url('fluent/carbon') !!}">DateTime/Carbon Objects</a></li>
                <li><a class="keyword {!! Request::is('fluent/joins') ? 'active' : '' !!}" href="{!! url('fluent/joins') !!}">Join Queries</a></li>
                <li><a class="keyword {!! Request::is('fluent/ioc') ? 'active' : '' !!}" href="{!! url('fluent/ioc') !!}">IOC Container [v5.2++]</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#collection">Collection</a>
        <div id="collection" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('collection/array') ? 'active' : '' !!}" href="{!! url('collection/array') !!}">Collection of Array Data Source</a></li>
                <li><a class="keyword {!! Request::is('collection/object') ? 'active' : '' !!}" href="{!! url('collection/object') !!}">Collection of Object Data Source</a></li>
                <li><a class="keyword {!! Request::is('collection/github') ? 'active' : '' !!}" href="{!! url('collection/github') !!}">Github API Data Source</a></li>
                <li><a class="keyword {!! Request::is('collection/basic') ? 'active' : '' !!}" href="{!! url('collection/basic') !!}">Basic</a></li>
                <li><a class="keyword {!! Request::is('collection/basic-object') ? 'active' : '' !!}" href="{!! url('collection/basic-object') !!}">Object Data Source</a></li>
                <li><a class="keyword {!! Request::is('collection/multi-filter-select') ? 'active' : '' !!}" href="{!! url('collection/multi-filter-select') !!}">Column Search</a></li>
                <li><a class="keyword {!! Request::is('collection/add-edit-remove-column') ? 'active' : '' !!}" href="{!! url('collection/add-edit-remove-column') !!}">Add/Edit/Remove Column</a></li>
                <li><a class="keyword {!! Request::is('collection/dt-row') ? 'active' : '' !!}" href="{!! url('collection/dt-row') !!}">DT Row Option</a></li>
                <li><a class="keyword {!! Request::is('collection/custom-filter') ? 'active' : '' !!}" href="{!! url('collection/custom-filter') !!}">Custom Filter</a></li>
                <li><a class="keyword {!! Request::is('collection/carbon') ? 'active' : '' !!}" href="{!! url('collection/carbon') !!}">DateTime/Carbon Objects</a></li>
                <li><a class="keyword {!! Request::is('collection/ioc') ? 'active' : '' !!}" href="{!! url('collection/ioc') !!}">IOC Container [v5.2++]</a></li>
                <li><a class="keyword {!! Request::is('collection/total-records') ? 'active' : '' !!}" href="{!! url('collection/total-records') !!}">Set Total Records</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#htmlBuilder">HTML Builder</a>
        <div id="htmlBuilder" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('html/basic') ? 'active' : '' !!}" href="{!! url('html/basic') !!}">Html Builder via Dependency Injection</a></li>
                <li><a class="keyword {!! Request::is('html/method') ? 'active' : '' !!}" href="{!! url('html/method') !!}">Html Builder via Method Injection</a></li>
                <li><a class="keyword {!! Request::is('html/columns') ? 'active' : '' !!}" href="{!! url('html/columns') !!}">Html Builder with Plain Columns</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#eloquentRelations">Eloquent Relations</a>
        <div id="eloquentRelations" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('eloquent/relationships') ? 'active' : '' !!}" href="{!! url('eloquent/relationships') !!}">Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('relation/has-one') ? 'active' : '' !!}" href="{!! url('relation/has-one') !!}">Has One Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('relation/has-many') ? 'active' : '' !!}" href="{!! url('relation/has-many') !!}">Has Many Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('relation/belongs-to') ? 'active' : '' !!}" href="{!! url('relation/belongs-to') !!}">Belongs To Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('relation/belongs-to-many') ? 'active' : '' !!}" href="{!! url('relation/belongs-to-many') !!}">Belongs To Many Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('relation/morph-to-many') ? 'active' : '' !!}" href="{!! url('relation/morph-to-many') !!}">Morph To Many Eager Loading</a></li>
                <li><a class="keyword {!! Request::is('eloquent/has-many') ? 'active' : '' !!}" href="{!! url('eloquent/has-many') !!}">HasMany Relationship</a></li>
                <li><a class="keyword {!! Request::is('eloquent/joins') ? 'active' : '' !!}" href="{!! url('eloquent/joins') !!}">Join Queries</a></li>
                <li><a class="keyword {!! Request::is('eloquent/with-trashed') ? 'active' : '' !!}" href="{!! url('eloquent/with-trashed') !!}">With Trashed (Soft Deletes)</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a class="sidebar-list-title block" data-toggle="collapse" data-target="#serviceImplementatuibs">Service Implementations</a>
        <div id="serviceImplementatuibs" class="collapse collapse-top in">
            <ul class="list-sub-items">
                <li><a class="keyword {!! Request::is('services/basic') ? 'active' : '' !!}" href="{!! url('services/basic') !!}">Basic Implementation</a></li>
                <li><a class="keyword {!! Request::is('services/scope') ? 'active' : '' !!}" href="{!! url('services/scope') !!}">DataTables Scoping</a></li>
                <li><a class="keyword {!! Request::is('services/two-datatables') ? 'active' : '' !!}" href="{!! url('services/two-datatables') !!}">Two DataTables</a></li>
                <li><a class="keyword {!! Request::is('services/users-with-footer') ? 'active' : '' !!}" href="{!! url('services/users-with-footer') !!}">Footer Column Search</a></li>
            </ul>
        </div>
    </li>
</ul>
