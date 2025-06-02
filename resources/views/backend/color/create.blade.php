@extends('backend.layouts.master')
@section('main-content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add color</h2>
            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('color.store') }}" method="post">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Color Name</label>
                            <div id="tag-container">
                                <input type="text" id="tag-input" placeholder="Enter tags...">
                                <input type="hidden" name="color" id="color-hidden-input">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Color</button>
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
        const hiddenInput = document.getElementById("color-hidden-input");

        let tags = [];

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

        function addTag(text) {
            if (!tags.includes(text)) {
                tags.push(text);
                updateHiddenInput();

                let tag = document.createElement("span");
                tag.classList.add("tag");
                tag.innerHTML = `${text} <span class="close">&times;</span>`;
                tagContainer.insertBefore(tag, tagInput);

                tag.querySelector(".close").addEventListener("click", function() {
                    tags = tags.filter(t => t !== text);
                    tag.remove();
                    updateHiddenInput();
                });
            }
        }

        function updateHiddenInput() {
            hiddenInput.value = tags.join(",");
        }
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
