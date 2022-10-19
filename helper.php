$startDate  = \Carbon\Carbon::parse($request->sdate);
$endeDate = \Carbon\Carbon::parse($request->edate);

$dataCount = Test::whereBetween('sdate', [$startDate, $endeDate])
                  ->orWhereBetween('edate', [$startDate, $endeDate])->count();
if($dataCount > 0){
     return "go to save";
}


$eventsCount = Events::where(function ($query) use ($startTime, $endTime) {
 $query->where(function ($query) use ($startTime, $endTime) {
    $query->where('start', '>=', $startTime)
            ->where('end', '<', $startTime);
    })
    ->orWhere(function ($query) use ($startTime, $endTime) {
        $query->where('start', '<', $endTime)
                ->where('end', '>=', $endTime);
    });
})->count();