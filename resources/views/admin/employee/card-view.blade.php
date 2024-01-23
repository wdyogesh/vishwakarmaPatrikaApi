@if (count($getemployee) > 0)
    <div class="row">
        @foreach ($getemployee as $employee)
        <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2">
            <div class="card card-section text-center">
                <img src="{{Helper::image_path($employee->profile_image)}}" class="listing-view-image mx-auto" alt="...">
                <div class="card-body py-3">
                    <h6 class="card-title fw-bold mb-2">{{$employee['role_info']->role_name}}</h6>
                    <div class="item-details px-2">
                        <div class="d-flex justify-content-between">{{trans('labels.name')}} <span>{{$employee->name}}</span></div>
                        <div class="d-flex justify-content-between">{{trans('labels.mobile')}} <span>{{$employee->mobile}}</span></div>
                        <div class="d-flex justify-content-between">{{trans('labels.email')}} <span>{{$employee->email}}</span></div>
                    </div>
                </div>
                <div class="card-footer py-0">
                    <div class="row justify-content-center">
                        @if ($employee->is_available == 1)
                        <a class="btn text-success d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$employee->id}}','2','{{URL::to('admin/employee/status')}}')" @endif>
                            <i class="fa fa-check"></i><small>{{trans('labels.status')}}</small>
                        </a>
                        @else
                        <a class="btn text-danger d-grid" @if(env('Environment')=='sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$employee->id}}','1','{{URL::to('admin/employee/status')}}')" @endif>
                            <i class="fa fa-close"></i><small>{{trans('labels.status')}}</small>
                        </a>
                        @endif
                        <a class="btn text-info d-grid" href="{{URL::to('admin/employee/show-'.$employee->id)}}">
                            <i class="fa fa-edit"></i><small>{{trans('labels.update')}}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{$getemployee->links()}}
        </div>
    </div>
@else
@include('admin.nodata')
@endif