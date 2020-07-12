@extends('layouts.admin')
@section('content')
<table border="1">
    <tr>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>メッセージ数</th>
        <th>削除</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->messages_count }}</td>
        <td><input type="button" class="del_btn" data-id="{{ $user->id }}" data-name="{{ $user->name }}" value="削除"></td>
    </tr>
    @endforeach
</table>
<script>
    $(function() {
        $('table .del_btn').on('click', function() {
            var $btn = $(this);
            if (confirm($btn.data('name') + ' を削除します。よろしいですか？')) {
                $.ajax({
                    url: "{{ route('admin.user.delete', '') }}",
                    method: 'post',
                    data: {
                        _method: 'delete',
                        id: $btn.data('id')
                    }
                }).done(function() {
                    $btn.closest('tr').remove()
                }).fail(function(xhr, str1, str2) {
                    alert(str2)
                })
            }
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#csrf-token').attr('content')
            }
        })
    })
</script>
@endsection