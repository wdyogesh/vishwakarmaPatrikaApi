<table class="table table-striped table-bordered zero-configuration">

    <thead>

        <tr>

            <th>#</th>

            <th>{{trans('labels.name')}}</th>

            <th>{{trans('labels.category')}}</th>

            <th>{{trans('labels.status')}}</th>

            <th>{{trans('labels.action')}}</th>

        </tr>

    </thead>

    <tbody>

        @php $i = 1; @endphp

        @foreach ($getsubcategory as $category)

        <tr id="dataid{{$category->id}}">

            <td>@php echo $i++; @endphp</td>

            <td>{{$category->subcategory_name}}</td>

            <td>{{@$category['category_info']->category_name}}</td>

            <td>

                @if ($category->is_available == 1)

                    <a class="badge badge-success px-2" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$category->id}}','2','{{ URL::to('admin/sub-category/status')}}')" @endif style="color: #fff;">{{trans('labels.active')}}</a>

                @else

                    <a class="badge badge-danger px-2" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="StatusUpdate('{{$category->id}}','1','{{ URL::to('admin/sub-category/status')}}')" @endif style="color: #fff;">{{trans('labels.deactive')}}</a>

                @endif

            </td>

            <td>

                <a href="{{URL::to('admin/sub-category-'.$category->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{trans('labels.edit_category')}}">

                    <span class="badge badge-success">{{trans('labels.edit')}}</span>

                </a>

                <a class="badge badge-danger px-2" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="Delete('{{$category->id}}','{{URL::to('admin/sub-category/delete')}}')" @endif style="color: #fff;">{{trans('labels.delete')}}</a>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>