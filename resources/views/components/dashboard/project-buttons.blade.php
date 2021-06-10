<div class="content-buttons mt-3" style="display: flex; justify-content: space-between;">
    <div class="add-btn-container">
        <button type="button" class="btn btn-success add-template-btn mr-1">
            {{ __('Create template') }}
        </button>
        <button type="button" class="btn btn-secondary add-content-btn">
            {{ __('Add custom content') }}
        </button>
    </div>
    <div class="form-btn-container">
        <button type="submit" form="project-create-form" class="btn btn-primary mr-1">
            {{ __('Save') }}
        </button>
        <button type="reset" form="project-create-form" class="btn btn-outline-warning">
            {{ __('Reset') }}
        </button>
    </div>
</div>
