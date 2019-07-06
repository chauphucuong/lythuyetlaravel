{!! Form::open(array('route'=>'sendEmail','files'=>true)) !!}
{!! Form::label('hoten','Họ tên') !!}
{!! Form::text('txtHoten','',array('class'=>'input')) !!} <br/> <br/>

{!! Form::label('matkhau','Mật khẩu') !!}
{!! Form::password('txtMatKhau') !!} <br/> <br/>
{{-- {!! Form::text('txtMatKhau','',array('class'=>'input')) !!} <br/> <br/> --}}

{!! Form::label('email','Email') !!} 
{!! Form::email('txtEmail','',array('class'=>'input')) !!} <br/> <br/>

{!! Form::label('ghichu','Ghi chú') !!} 
{!! Form::textarea('txtGhiChu','',array('class'=>'input','rows'=>'5')) !!} <br/> <br/>

{!! Form::label('gioitinh','Giới tính') !!} 
{!! Form::radio('rdoGioiTinh','nam',true)!!} Nam
{!! Form::radio('rdoGioiTinh','nu')!!} Nữ <br/> <br/>

{!! Form::label('ThanhPho','Thành Phố') !!} 
{!! Form::select('sltThanhPho',array(
    'hn'=>'Hà Nội',
    'h' =>'Huế',
    'hcm'=>'Hồ Chí Minh'
),'h') !!} <br/> <br/>

{!! Form::label('monhoc','Môn học') !!} 
{!! Form::checkbox('chkMonHoc','swift') !!} Swift 
{!! Form::checkbox('chkMonHoc','php') !!} PHP & MySQL 
{!! Form::checkbox('chkMonHoc','android') !!} Android <br/> <br/>

{!! Form::hidden('website','khoapham.vn') !!}  

{!! Form::label('hinh','Avatar') !!} 
{!! Form::file('fImages') !!} <br/> <br/>

{!! Form::submit('Gửi') !!}
{!! Form::button('Oke') !!}
{!! Form::reset('Xóa') !!}
{!! Form::close() !!}