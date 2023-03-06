<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($quiz->group_id) ? $quiz->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quizz') ? 'has-error' : ''}}">
    <label for="quizz" class="control-label">{{ 'Quizz' }}</label>
    <textarea class="form-control" rows="5" name="quizz" type="textarea" id="quizz" >{{ isset($quiz->quizz) ? $quiz->quizz : ''}}</textarea>
    {!! $errors->first('quizz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi1') ? 'has-error' : ''}}">
    <label for="opsi1" class="control-label">{{ 'Opsi1' }}</label>
    <textarea class="form-control" rows="5" name="opsi1" type="textarea" id="opsi1" >{{ isset($quiz->opsi1) ? $quiz->opsi1 : ''}}</textarea>
    {!! $errors->first('opsi1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi2') ? 'has-error' : ''}}">
    <label for="opsi2" class="control-label">{{ 'Opsi2' }}</label>
    <textarea class="form-control" rows="5" name="opsi2" type="textarea" id="opsi2" >{{ isset($quiz->opsi2) ? $quiz->opsi2 : ''}}</textarea>
    {!! $errors->first('opsi2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi3') ? 'has-error' : ''}}">
    <label for="opsi3" class="control-label">{{ 'Opsi3' }}</label>
    <textarea class="form-control" rows="5" name="opsi3" type="textarea" id="opsi3" >{{ isset($quiz->opsi3) ? $quiz->opsi3 : ''}}</textarea>
    {!! $errors->first('opsi3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi4') ? 'has-error' : ''}}">
    <label for="opsi4" class="control-label">{{ 'Opsi4' }}</label>
    <textarea class="form-control" rows="5" name="opsi4" type="textarea" id="opsi4" >{{ isset($quiz->opsi4) ? $quiz->opsi4 : ''}}</textarea>
    {!! $errors->first('opsi4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label>
    <input class="form-control" name="answer" type="number" id="answer" value="{{ isset($quiz->answer) ? $quiz->answer : ''}}" >
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
