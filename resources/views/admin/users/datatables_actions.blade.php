{!! Form::open(['route' => ['admin.users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.users.show', $id) }}" class='btn btn-warning btn-sm'>
    <i class="glyphicon glyphicon-eye-open"></i>
    </a>

    <a href="{{ route('admin.users.edit', $id) }}" class='btn btn-info btn-sm'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
