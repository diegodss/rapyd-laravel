

<div class="rpd-datagrid">
    @include('rapyd::toolbar', array('label'=>$label, 'buttons_right'=>$buttons['TR']))
    
    <div class="table-responsive">
        <table{!! $dg->buildAttributes() !!}>
            <thead>
            <tr>
                @foreach ($dg->columns as $column)
                    <th{!! $column->buildAttributes() !!}>
                        @if ($column->orderby)
                            @if ($dg->onOrderby($column->orderby_field, 'asc'))
                                <span class="glyphicon glyphicon-chevron-up"></span>
                            @else
                                <a href="{{ $dg->orderbyLink($column->orderby_field,'asc') }}">
                                    <span class="glyphicon glyphicon-chevron-up"></span>
                                </a>
                            @endif
                            @if ($dg->onOrderby($column->orderby_field, 'desc'))
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            @else
                                <a href="{{ $dg->orderbyLink($column->orderby_field,'desc') }}">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                            @endif
                        @endif
                        {!! $column->label !!}
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @if (count($dg->rows) == 0)
                <tr><td colspan="{!! count($dg->columns) !!}">{!! trans('rapyd::rapyd.no_records') !!}</td></tr>
            @endif
            @foreach ($dg->rows as $row)
                <tr{!! $row->buildAttributes() !!}>
                    @foreach ($row->cells as $cell)
                        <td{!! $cell->buildAttributes() !!}>{!! $cell->value !!}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="btn-toolbar-no" role="toolbar">
    @if ($dg->havePagination())
    <div class="row">
        <div class="col-xs-6">
        <div class="pull-left">
                {!! $dg->links() !!}
            </div>
        </div>
        <div class="col-xs-6">
            <div class="pull-right  rpd-total-rows">
                <span class="btn btn-default  disabled">Total: {!! $dg->totalRows() !!}</span>
            </div>
        </div>
    </div>
    @endif
</div>

