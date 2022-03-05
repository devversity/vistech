                @if($mode !== 'view')
                <div class="card card-primary card-outline p-5">
                    <div class="row">
                        <div class="col-12">
                            <h4>Form Recipients</h4>
                            <p>Choose who will receive this form, you can choose from defaults below or enter a custom email address.</p>
                            <hr/>
                        </div>
                        <div class="col-12">
                            @if(!empty($emails))
                                @foreach ($emails as $email)
                                    <br/>
                                    <input type="checkbox" id="field_{{$email->email}}" name="emails[]" value="{{$email->email}}">
                                    <label for="field_{{$email->email}}">{{$email->email}}</label>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <label for="field_email_other"></label>
                                <input type="input" name="email_other" class="form-control" id="field_email_other" value="">
                            </div>
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
