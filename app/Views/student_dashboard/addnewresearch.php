<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Add New Research</h2>
                <p class="text-muted">All fields are required!</p>
                <div class="card-deck">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Add Research Details</strong>
                        </div>
                        <div class="card-body">
                            <form action="/addresearch" method="post">
                                <div class="form-row">
                                    <input type="hidden" name="id">
                                    <div class="form-group col-lg-12">
                                        <label for="researchtitle">Research Title</label>
                                        <input type="type" class="form-control" name="researchtitle" id="researchtitle" placeholder="Research Title">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="submittedto">Teacher</label>
                                        <input type="text" class="form-control" name="submittedto" id="submittedto" placeholder=" Teacher">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author/s</label>
                                    <textarea class="form-control" name="author" id="author" placeholder="Author/s"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="idnumber">ID Number</label>
                                        <input type="text" class="form-control" name="idnumber" id="idnumber" placeholder="ID Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gradelevel">Grade Level</label>
                                        <input type="text" class="form-control" name="gradelevel" id="gradelevel" placeholder="Grade Level">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" name="section" id="section" placeholder="Section">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="uploaddate">Upload Date</label>
                                        <input type="date" class="form-control" name="uploaddate" id="uploaddate" placeholder="Upload Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="abstract">Abstract</label>
                                    <textarea class="form-control" name="abstract" id="abstract" rows="4" placeholder="Abstract"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" name="keywords" id="keywords" rows="4" placeholder="Keywords"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="citation">Citation</label>
                                    <textarea class="form-control" name="citation" id="citation" rows="4" placeholder="Citation"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="status">status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Under Revision">Under Revision</option>
                                            <option value="Approved">Approved</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="file">Upload PDF</label>
                                        <input type="file" class="form-control" accept="pdf/*" name="file" id="file">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>