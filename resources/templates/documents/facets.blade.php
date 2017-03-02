
<div class="doc-filters" id="filters-area">

	<div class="elastic-list-container @if(isset($filters) && !is_null($filters)) visible @endif" rv-visible="isVisible">
		<div id="elasticlist" class="elasticlist">
	
		@foreach($columns as $facet => $value)
		
			<div class="el-column" style="width:{{$width}}%" data-facet="{{$facet}}">
				<div class="el-header">{{$value['label']}}</div>
				<div class="el-filter-container">
					@if(isset($value['items']))
					
						@foreach($value['items'] as $f)
							
							<a href="{{DmsRouting::filterSearch($facet_filters_url, $current_active_filters, $facet, $f->term, $f->selected )}}" class="el-filter @if(property_exists($f, 'is_project') && $f->is_project) project--mark @elseif(property_exists($f, 'is_project')) personal--mark @endif @if($f->selected) current @endif @if($f->collapsed) collapsed @endif @if( property_exists($f, 'locked') && $f->locked) locked hint--top @endif" @if( property_exists($f, 'locked') && $f->locked)data-hint="{{trans('actions.filters.collection_locked')}}"@endif title="@if(property_exists($f, 'parents')) {{$f->parents}} @elseif(property_exists($f, 'label')) {{$f->label}} @else {{$f->term}} @endif " data-facet="{{$facet}}" data-filter="{{$f->term}}">
								<span class="el-filter-count">{{$f->count}}</span>
								<span class="el-filter-name">@if(property_exists($f, 'label')){{$f->label}}@else{{$f->term}}@endif</span>
							</a>
							
						@endforeach
					
					@endif
				</div>
			
			
			
					
			</div>
		@endforeach
		
		
		</div>
		
		
	</div>
@if(auth()->check())
	<div class="filter-buttons">


        <div class="filter-buttons-line">

			<!--@ i f(isset($context) && $context === 'projectspage')
				<span class="sort-widget">
                	<span class="btn-icon icon-content-black icon-content-black-ic_sort_black_24dp"></span> {{ trans('documents.sort.sorted_by', ['sort' => isset($is_search_requested) && $is_search_requested ? trans('documents.sort.type_search_relevance') : trans('documents.sort.type_project_name')])}}
				</span>
			@e n d if-->
		
            <a href="#" class="button" rv-on-click="openClose">
                <span class="btn-icon icon-content-black icon-content-black-ic_filter_list_black_24dp"></span>{{trans('actions.filters.filter')}}
            </a>
            @if(isset($filters) && !empty($filters))
            <a href="{{$clear_filter_url}}" class="button"><span class="btn-icon icon-content-black icon-content-black-ic_clear_black_24dp"></span>{{trans('actions.filters.clear_filters')}}</a>
            @endif

			@yield('additional_filter_buttons')

        </div>

	</div>
@endif

</div>