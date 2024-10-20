<div class="chat-header clearfix">
    @include('chat._header')
</div>
<div class="chat-history">
    @include('chat._chat')
</div>
<div class="chat-message clearfix">
    <form action="" id="submit_message" method="post" class="mb-0" enctype="multipart/form-data">
        <input type="hidden" value="{{ $getReceiver->id }}" name="receiver_id">
        {{ @csrf_field() }}
        <textarea class="form-control emojionearea" id="ClearMessage" name="message"
         required placeholder="Ingresa tu mensaje"></textarea> <br>

        <div class="row">
            <div class="col-md-6 hidden-sm ">

                <a href="javascript:void(0);" id="OpenFile" style="margin-top: 10px;" class="btn btn-outline-primary"><i
                        class="fa fa-image"></i></a>
                        <input type="file" style="display: none"
                        name="file_name" id="file_name">
                        <span id="getFilename"></span>

            </div>
            <div class="col-md-6" style="text-align: right;">
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>
