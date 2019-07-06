Đây là trang demo của response <br/>
<style>
    .danger{color:red}
    .info{color:blue}
</style>
@if(Session::has('messages'))
    <span class="{{ Session::get('level') }}">
        {{ Session::get('messages')  }}
    </span>
@endif