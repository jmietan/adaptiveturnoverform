
$fileloc = "C:\xampp\htdocs\adaptive\sg\turnover"


#incident data

### HIGH PRIORITY CASES ###
ConvertTo-Xml -InputObject (&{Get-RemedyTicket -status "In Progress" -Team ADAPTIVE_ServiceDesk -full; Get-RemedyTicket -status "Assigned" -Team ADAPTIVE_ServiceDesk -full} | where-object {$_.Priority -eq "High" -or $_.Priority -eq "Critical"} | select "Incident Number", Organization, Impact,Status, CI, Description) -As Stream -Depth 3 | Out-File $fileloc\xml\adaptive-high-inc.xml

###SWQ -All Active CASES  ###
ConvertTo-Xml -InputObject (&{Get-RemedyTicket -status "In Progress" -Team ADAPTIVE_ServiceDesk -full; Get-RemedyTicket -status "Assigned" -Team ADAPTIVE_ServiceDesk -full} | select "Incident Number", Organization, Impact, Status, Assignee, CI, Description) -As Stream -Depth 3 | Out-File $fileloc\xml\adaptive-swq.xml

## CRQ  ####

#CRQ  DRAFTS  
ConvertTo-Xml -InputObject (Get-RemedyChange -Team ADAPTIVE_ServiceDesk  -Status Draft |select 'Infrastructure Change ID', Customer, Priority, Description,"Scheduled Start Date", "Scheduled End Date","Assigned Group", Status | Sort-Object -Property "Scheduled Start Date" ) -As Stream -Depth 3 | Out-File $fileloc\xml\adaptive-CRQdrafts.xml

#CRQ next 24 hours 
ConvertTo-Xml -InputObject (Get-RemedyChange -Team ADAPTIVE_ServiceDesk -After (Get-Date '08:00') -Before (Get-Date '08:00').adddays(2) -full | where-object {$_."Scheduled Start Date" -gt  (get-date '00:00') -AND $_."Scheduled Start Date" -lt  (get-date '23:59')}|where-object {$_."Change Request Status" -ne "Closed" -or $_."Change Request Status" -ne "Completed" -AND $_."Change Request Status" -ne "Cancelled"} | sort-object "Scheduled Start Date"  | select "Infrastructure Change ID", "Customer Company", "Change Request Status","Change Timing","Scheduled Start Date", "Scheduled End Date", ASGRP, Description) -As Stream -Depth 3 | Out-File $fileloc\xml\adaptive-CRQnext24.xml

#CRQ  PENDING 
#ConvertTo-Xml -InputObject (Get-RemedyChange -Team ADAPTIVE_ServiceDesk  -Status Pending |select 'Infrastructure Change ID', Customer, Priority, Description,"Scheduled Start Date", "Scheduled End Date","Assigned Group", Status | Sort-Object -Property "Scheduled Start Date" ) -As Stream -Depth 3 | Out-File $fileloc\xml\adaptive-CRQpending.xml

