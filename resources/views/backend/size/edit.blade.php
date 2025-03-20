@extends('backend.layouts.master')

@section('main-content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Size</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('size.update', $size->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- PUT Method for Update -->
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Size Name</label>
                            <div id="tag-container">
                                <!-- Existing tags will be shown here -->
                                @foreach (json_decode($size->size) as $s)
                                    <span class="tag" data-tag="{{ $s }}">{{ $s }} <span
                                            class="close">&times;</span></span>
                                @endforeach
                                <input type="text" id="tag-input" placeholder="Enter tags...">
                                <input type="hidden" name="size" id="size-hidden-input"
                                    value="{{ implode(',', json_decode($size->size)) }}"> <!-- Initial Value for Editing -->
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Size</button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tagContainer = document.getElementById("tag-container");
        const tagInput = document.getElementById("tag-input");
        const hiddenInput = document.getElementById("size-hidden-input");

        let tags = @json(json_decode($size->size)); // Initial tags set from the database

        // Add existing tags to the container
        tags.forEach(tag => addTag(tag));

        tagInput.addEventListener("keypress", function(event) {
            if (event.key === "," || event.key === " ") {
                event.preventDefault();
                let tagText = tagInput.value.trim();
                if (tagText) {
                    addTag(tagText);
                    tagInput.value = "";
                    tagInput.focus();
                }
            }
        });

        // Add a new tag to the container
        function addTag(text) {
            if (!tags.includes(text)) {
                tags.push(text);
                updateHiddenInput();

                let tag = document.createElement("span");
                tag.classList.add("tag");
                tag.innerHTML = `${text} <span class="close">&times;</span>`;
                tag.dataset.tag = text; // Add data attribute for reference
                tagContainer.insertBefore(tag, tagInput);

                // Remove tag on click
                tag.querySelector(".close").addEventListener("click", function() {
                    tags = tags.filter(t => t !== text); // Remove tag from array
                    tag.remove(); // Remove tag from UI
                    updateHiddenInput(); // Update hidden input value
                });
            }
        }

        // Update the hidden input with the new tags
        function updateHiddenInput() {
            hiddenInput.value = tags.join(","); // Join tags as comma-separated string
        }

        // Remove the tag from both the tags array and the hidden input when the cross icon is clicked
        tagContainer.querySelectorAll('.tag .close').forEach(closeButton => {
            closeButton.addEventListener('click', function() {
                const tag = this.parentElement;
                const tagText = tag.dataset.tag;
                tags = tags.filter(t => t !== tagText);
                tag.remove();
                updateHiddenInput();
            });
        });
    });
</script>

<style>
    #tag-container {
        width: 300px;
        padding: 5px;
        border: 2px solid #007bff;
        border-radius: 5px;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .tag {
        background: #007bff;
        color: white;
        padding: 5px;
        border-radius: 3px;
        display: flex;
        align-items: center;
    }

    .tag .close {
        margin-left: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    #tag-input {
        border: none;
        outline: none;
        font-size: 14px;
        padding: 5px;
    }
</style>
