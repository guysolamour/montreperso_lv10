{!! form_start($form) !!}

{!! form_rest($form) !!}

@dropzone([
    'collection' => "images",
    'label'      =>  "Images",
    'model'      => $form->getModel(),
])
{{-- add tinymce here --}}


@if (isset($edit) && $edit)
<div class="form-group">
    <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i> Modifier</button>
</div>
@endif

@if (!isset($edit))
<div class="form-group">
    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Enregistrer</button>
</div>
@endif



{!! form_end($form) !!}


{{-- add daterange here --}}
