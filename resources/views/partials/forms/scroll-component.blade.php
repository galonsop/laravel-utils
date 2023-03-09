<div class="row mb-1">
    <div class="col-lg-6 col-sm-12">
        <div class="scroll-component form-control">
            <ul class="pl-3">
            @foreach($selected_objects as $object)
                <li class="mb-1">
                    <span>{{$object->name}}</span>
                    <a href="{{ route('back.offers.delete-entity', [$parent, $type, $object->id]) }}"
                       class="btn btn-default btn-sm btn-danger ml-2"><i class="fa fa-trash"></i></a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>