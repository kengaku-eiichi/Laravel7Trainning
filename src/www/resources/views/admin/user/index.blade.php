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
        <td><input type="button" class="del_btn" data-id="{{ $user->id }}" value="削除"></td>
    </tr>
    @endforeach
</table>
<script>
    $(function() {
        function deleteUser(url, btn) {
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    _method: 'delete'
                }
            }).done(function() {
                $(btn).closest('tr').remove()
            }).fail(function(xhr, str1, str2) {
                alert(str1, str2)
            })
        }
        $('table').on('click', '.del_btn', function() {
            var url = "{{ route('admin.user.delete', '') }}/" + $(this).data('id');
            deleteUser(url, this);
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#csrf-token').attr('content')
            }
        })
    })
</script>
@endsection