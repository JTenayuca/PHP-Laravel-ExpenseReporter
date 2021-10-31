@php
                    use App\expense_reports;
                    use App\expense_items;
                    $reports = expense_reports::where('user_id', Auth::user()->id)->first();
            
                    $item = expense_items::where('report_id', $reports->id)->get();



            if ($item -> count() > 0) {
                                    echo '<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>Item</td>
                                                <td>Date Created</td>
                                                <td>Updated at</td>
                                                <td>Vendor</td>
                                                <td>Amount</td>
                                                <td>Notes</td>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        foreach ($item as $item) {
                                            echo '<tr><td>' . '<a href="/report/' . $report->id . '">' . $report->REPORT_NAME . '</a>'. '</td><td>' . $report->created_at . '</td><td>' . $report->updated_at . '</td><td><a class="btn btn-success" href="/edit/' . $report->id . '" role="button">Edit</a></td><td><a class="btn btn-danger" href="/delete/' . $report->id . '" role="button">Delete</a></td></tr>'; 
                                        }
                                        
                                        echo '</tbody>
                                    </table>';
                                }
                                else {
                                    echo '<p>No Expenses Found!</p>';
                                }

@endphp