<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormRegistrationLists extends Controller
{
    /**
     * Fnction returnt the lists of form for registration
     */
    public function formFieldsList(Request $request)
    {
        $subcaste = ['Black Smith', 'Carpenters', 'Goldsmiths', 'Sculptors', 'Others', 'Dont wish to specify', 'Dont know my sub-caste'];
        $maritalStatus = ['Single', 'Divorced', 'Widow', 'Handicapped'];
        $profileBy = ['Self', 'Parent/Gaurdian', 'Brother/Sister', 'Relative', 'Friend', 'Other'];
        $educationsLists = ['-----PG-Professional Courses----', 'CA (Chartered Accountant)', 'CFA (Chartered Financial Analyst)',
        'CS(Company Secretary)',
        'ICWA',
        'Integrated PG',
        'M.Arch.(Architecture)',
        'M.Ed.(Education)',
        'M.Lib.Sc.(Library Sciences)',
        'M.Plan.(Planning)',
        'Master of Fashion Technology',
        'Master of Health Administration',
        'Master of Hospital Administration',
        'MBA/PGDM',
        'MCA PGDCA part time',
        'MCA/PGDCA',
        'ME/M.Tech/MS (Engg/Sciences)',
        'MFA (Fine Arts)',
        'ML/LLM (Law)',
        'MSW (Social Work)',
        'PG Diploma',

        '------------PG-General Courses-----------',
        'M.Com.(Commerce)',
        'M.Sc.(Science)',
        'MA (Arts)',

        '-------Graduation-Professional Courses------------',
        'B.Arch(Architecture)',
        'B.Ed(Education)',
        'B.El.Ed (Elementary Education)',
        'B.Lib.Sc (Library Sciences)',
        'B.P.Ed. (Physical Education)',
        'B.Plan (Planning)',
        'Bachelor of Fashion Technology',
        'BBA/BBM/BBS',
        'BCA(Computer Application)',
        'BE B.Tech(Engineering)',
        'BFA(Fine Arts)',
        'BHM(Hotel Management)',
        'BL/LLB/BGL(Law)',
        'BSW (Social Work)',

        '---------Graduation-General Courses-----------',
        'B.A.(Arts)',
        'B.Com(Commerce)',
        'B.Sc(Science)',

        '----------Medicine (General,Dental,Surgeon)---------------',
        'B.A.M.S',
        'B.Pharm (Pharmacy)',
        'B.V.Sc. (Veterinary Science)',
        'BDS(Dental Surgery)',
        'BHMS(Homeopathy)',
        'M.Pharm.(Pharmacy)',
        'M.V.Sc.(Veterinary Science)',
        'MBBS',
        'MD/MS(Medicine)',
        'MDS(Master of Dental Surgery)',
        'BPT(Physiotherapy)',
        'MPT(Physiotherapy)',

        '-----------Doctorate (Phd)------------',
        'M.Phil.(Philosophy)',
        'Ph.D.(Doctorate)',
        'Other Doctorate',

        '--------------Diploma Courses------------',
        'Arts/Graphic Designing',
        'Engineering',
        'Fashion/Design',
        'Languages',
        'Pilot Licenses',
        'Other Diploma',
        '-------12th but not pursuing graduation--------','12th','--------10th but not pursuing 12th-----------','10th'];
        $state = ['Andaman and Nicobar', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam','Bihar', 'Chandigarh', 'Chhattisgarh', 'Dadra &amp; Nagar Haveli', 'Daman and Diu', 'Delhi', 'Goa',
        'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland',
        'Orissa', 'Pondicherry', 'Punjab','Rajasthan', 'Sikkim', 'Tamil Nadu', 'Tripura', 'Uttar Pradesh', 'Uttaranchal', 'West Bengal'];
        return response()->json(['status' => 1, 'message' => trans('messages.success'), 'data' => [
            'subcaste' => $subcaste,
            'profileBy' => $profileBy,
            'state' => $state,
            'educationsLists' => $educationsLists,
            'maritalStatus' => $maritalStatus
        ]], 200);
    }
}
