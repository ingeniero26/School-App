<div class="row">
    <div class="col-lg-12">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
            <img style="height: 40px; width: 40px;" src="{{$getReceiver->getProfileDirect()}}" alt="avatar">
        </a>
        <div class="chat-about">
            <h6 class="m-b-0">{{$getReceiver->name}} {{$getReceiver->last_name}}</h6>
            <small>Visto: {{Carbon\Carbon::parse($getReceiver->updated_at)->diffForHumans() }}</small>
        </div>
    </div>
    {{-- <div class="col-lg-6 hidden-sm text-right">
        <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
        <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
        <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
        <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
    </div> --}}
</div>
