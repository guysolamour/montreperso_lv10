{!! form_start($forme) !!}

{!! form_rest($forme) !!}

@dropzone([
    'collection' => "front-image",
    'label'      =>  "Image",
    'model'      => $forme->getModel(),
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



{!! form_end($forme) !!}


{{-- add daterange here --}}
