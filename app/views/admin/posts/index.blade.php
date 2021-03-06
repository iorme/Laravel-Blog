@extends('admin/layouts/article')

@section('main')
<div class="panel-heading">All Articles</div>
<div class="panel-body">
    <p>{{ link_to_route('admin.artikel.create', '+ Add new article','',array('class' => 'btn btn-success btn-sm')) }}</p>
    @if ($artikel->count())
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Created At</th>
                    <th>Published Date</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($artikel as $art)
                <tr>
                    <td>{{ $art->judul }}</td>
                    <td>{{ date('d M Y',strtotime($art->tgl)) }}</td>
                    <td>{{ date('d M Y',strtotime($art->pubdate)) }}</td>
                    <td>{{ $stat[$art->status] }}</td>
                    <td>{{ link_to_route('admin.artikel.edit', 'Edit', array($art->id), array('class' => 'btn btn-info btn-sm')) }}</td>
                    <td>
                        {{ Form::open(array('method'
                        => 'DELETE', 'route' => array('admin.artikel.destroy', $art->id))) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div id='pagination'>
        {{ $artikel->links() }}
    </div>
    @else
    There are no users
    @endif
</div>
@stop