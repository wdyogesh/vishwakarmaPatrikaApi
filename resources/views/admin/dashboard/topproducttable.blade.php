@php
$ran = ['gradient-1', 'gradient-2', 'gradient-3', 'gradient-4', 'gradient-5', 'gradient-6', 'gradient-7', 'gradient-8', 'gradient-9'];
@endphp
<table class="table">
    <thead>
        <tr>
            <th>{{ trans('labels.image') }}</th>
            <th>{{ trans('labels.item_name') }}</th>
            <th>{{ trans('labels.category') }}</th>
            <th>{{ trans('labels.orders') }}</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1;@endphp
        @foreach ($topitems as $item)
            <tr>
                <td><img src="{{ Helper::image_path($item['item_image']->image_name) }}" class="rounded hw-50"
                            alt=""></td>
                <td>{{ $item->item_name }}</td>
                <td>{{ @$item['category_info']->category_name }} {{ @$item['subcategory_info'] != "" ? ' : '.@$item['subcategory_info']->subcategory_name : '' }}</td>
                <td>
                    @php
                        $per = ($item->item_order_counter * 100) / @$getorderdetailscount;
                    @endphp
                    {{number_format($per,2)}}%
                    <div class="progress" style="height: 10px">
                        <div class="progress-bar {{ $ran[array_rand($ran, 1)] }}"
                            style="width: {{ $per }}%;" role="progressbar"><span
                                class="sr-only">{{ $per }}% {{ trans('labels.orders') }}</span>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>