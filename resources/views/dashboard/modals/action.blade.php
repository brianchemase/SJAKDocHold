                            <!-- Approve Modal -->
                            <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveModalLabel">Approve Action</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="approveForm" action="{{ route('approve') }}" method="POST"> 
                                                @csrf              
                                                <div class="form-group">
                                                    <label for="approveAction">Action</label>
                                                    <input type="text" class="form-control" id="approveAction" name="action" value="Approve" readonly>
                                                    <input type="hidden" class="form-control" id="approveAction" name="ref" value="{{ $document->ref }}">
                                                    <input type="hidden" class="form-control" id="approveAction" name="userid" value="{{ Auth::user()->id }}" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="uploadDateTime">Date and Time</label>
                                                    <input type="text" class="form-control" id="uploadDateTime" name="actiontime" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="approveComment">Comment</label>
                                                    <textarea class="form-control" id="approveComment" name="comment" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Submit Approval</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Return Modal -->
                            <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="returnModalLabel">Return Action</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="returnForm" action="{{ route('return') }}" method="POST">
                                                @csrf 
                                                <div class="form-group">
                                                    <label for="returnAction">Action</label>
                                                    <input type="text" class="form-control" id="returnAction" name="action" value="return" readonly>
                                                    <input type="hidden" class="form-control" id="approveAction" name="ref" value="{{ $document->ref }}">
                                                    <input type="hidden" class="form-control" id="approveAction" name="userid" value="{{ Auth::user()->id }}" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="uploadDateTime">Date and Time</label>
                                                    <input type="text" class="form-control" id="uploadDateTime" name="actiontime" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="returnComment">Comment</label>
                                                    <textarea class="form-control" id="returnComment" name="comment" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit Return</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
