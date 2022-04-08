                @if($mode !== 'view')

                <div class="card card-primary card-outline p-5">
                    <div class="row">
                        <div class="col-12">
                            <h4>Form Images</h4>
                            <p>Upload images to this form..</p>
                            <hr/>
                        </div>

                        @for ($i=1; $i<6; $i++)
                        <div class="col-12">
                            <div class="form-group">
                                <label for="field_image_{{$i}}">Image {{$i}}</label>
                                <input type="file" id="field_image_{{$i}}" name="form_image_{{$i}}">
                            </div>
                        </div>
                        @endfor

                    </div>
                </div>

                <div class="card card-primary card-outline p-5">
                    <div class="row">
                        <div class="col-12">
                            <h4>Form Recipients</h4>
                            <p>Choose who will receive this form..</p>
                            <hr/>
                        </div>
                        <div class="col-12">
                            @if(!empty($emails))
                                @foreach ($emails as $email)
                                    <br/>
                                    <input type="checkbox" id="field_{{$email->email}}" name="emails[]" value="{{$email->email}}" onclick="return false;" checked>
                                    <label for="field_{{$email->email}}">{{$email->email}}</label>
                                @endforeach
                            @endif

                            @if (in_array($id, [2, 4]))
                                    <br/>
                                    <input type="checkbox" id="field_accounts@vistechservices.co.uk" name="emails[]" value="accounts@vistechservices.co.uk" onclick="return false;" checked >
                                    <label for="field_accounts@vistechservices.co.uk">accounts@vistechservices.co.uk</label>
                            @elseif ($id === 3)
                                    <br/>
                                    <input type="checkbox" id="field_hr@vistechservices.co.uk" name="emails[]" value="hr@vistechservices.co.uk" onclick="return false;" checked>
                                    <label for="field_hr@vistechservices.co.uk">hr@vistechservices.co.uk</label>
                            @endif

{{--                            <div class="form-group">--}}
{{--                                <label for="field_email_other"></label>--}}
{{--                                <input type="input" name="email_other" class="form-control" id="field_email_other" value="sss">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if($mode !== 'view')
            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-info" style="float:right">Submit Form</button>
            </div>
            </form>
            @endif
        </div>
    </div>
</div>
