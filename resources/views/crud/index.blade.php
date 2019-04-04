<div class="container">
    <div class="float-left">
        <a href="#modalForm" data-toggle="modal" data-href="{{url('user-admins/create')}}"
           class="btn btn-primary">הוספת משתמש חדש</a>
    </div>
    <h1 style="font-size: 1.3rem" class="text-right" dir="rtl">ניהול משתמשים</h1>
    <hr/>
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 form-group">
            {!! Form::select('gender',['-1'=>'Select Gender','Male'=>'Male','Female'=>'Female'],request()->session()->get('gender'),['class'=>'form-control','onChange'=>'ajaxLoad("'.url("user-admins").'?gender="+this.value)']) !!}
        </div>
        
    </div>
    <table class="table table-striped table-dark table-responsive-md">
        <thead class="bg-dark" style="color: white">
            <tr>
                <th width="60px" style="vertical-align: middle;text-align: center">No</th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        Name
                    </a>
                    
                </th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=gender&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        Gender
                    </a>
                    
                </th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        Email
                    </a>
                    
                </th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=user_name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        User name
                    </a>
                    
                </th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=phone&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        Phone
                    </a>
                    
                </th>
                <th style="vertical-align: middle">
                    <a href="javascript:ajaxLoad('{{url('user-admins?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                        Date
                    </a>
                    
                </th>
                <th width="130px" style="vertical-align: middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($customers as $customer)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $customer->name }}</td>
                <td style="vertical-align: middle">{{ $customer->gender }}</td>
                <td style="vertical-align: middle">{{$customer->email}}</td>
                <td style="vertical-align: middle">{{$customer->user_name}}</td>
                <td style="vertical-align: middle">{{$customer->phone}}</td>
                <td style="vertical-align: middle">{{date('d-M-Y',strtotime($customer->created_at))}}</td>
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('user-admins/update/'.$customer->id)}}">
                        <i class="fas fa-pencil-alt text-white"></i></a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$customer->id}}"
                       data-token="{{csrf_token()}}">
                        <i class="fas fa-trash-alt text-white"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$customers->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
</div>