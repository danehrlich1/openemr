<?php
/** @package    Openemr::Model::DAO */

/**
 *
 * Copyright (C) 2016-2017 Jerry Padgett <sjpadgett@gmail.com>
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @package OpenEMR
 * @author Jerry Padgett <sjpadgett@gmail.com>
 * @link https://www.open-emr.org
 */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * OnsiteActivityViewCriteria allows custom querying for the OnsiteActivityView object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Openemr::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class OnsiteActivityViewCriteriaDAO extends Criteria
{

    public $Id_Equals;
    public $Id_NotEquals;
    public $Id_IsLike;
    public $Id_IsNotLike;
    public $Id_BeginsWith;
    public $Id_EndsWith;
    public $Id_GreaterThan;
    public $Id_GreaterThanOrEqual;
    public $Id_LessThan;
    public $Id_LessThanOrEqual;
    public $Id_In;
    public $Id_IsNotEmpty;
    public $Id_IsEmpty;
    public $Id_BitwiseOr;
    public $Id_BitwiseAnd;
    public $Date_Equals;
    public $Date_NotEquals;
    public $Date_IsLike;
    public $Date_IsNotLike;
    public $Date_BeginsWith;
    public $Date_EndsWith;
    public $Date_GreaterThan;
    public $Date_GreaterThanOrEqual;
    public $Date_LessThan;
    public $Date_LessThanOrEqual;
    public $Date_In;
    public $Date_IsNotEmpty;
    public $Date_IsEmpty;
    public $Date_BitwiseOr;
    public $Date_BitwiseAnd;
    public $PatientId_Equals;
    public $PatientId_NotEquals;
    public $PatientId_IsLike;
    public $PatientId_IsNotLike;
    public $PatientId_BeginsWith;
    public $PatientId_EndsWith;
    public $PatientId_GreaterThan;
    public $PatientId_GreaterThanOrEqual;
    public $PatientId_LessThan;
    public $PatientId_LessThanOrEqual;
    public $PatientId_In;
    public $PatientId_IsNotEmpty;
    public $PatientId_IsEmpty;
    public $PatientId_BitwiseOr;
    public $PatientId_BitwiseAnd;
    public $Activity_Equals;
    public $Activity_NotEquals;
    public $Activity_IsLike;
    public $Activity_IsNotLike;
    public $Activity_BeginsWith;
    public $Activity_EndsWith;
    public $Activity_GreaterThan;
    public $Activity_GreaterThanOrEqual;
    public $Activity_LessThan;
    public $Activity_LessThanOrEqual;
    public $Activity_In;
    public $Activity_IsNotEmpty;
    public $Activity_IsEmpty;
    public $Activity_BitwiseOr;
    public $Activity_BitwiseAnd;
    public $RequireAudit_Equals;
    public $RequireAudit_NotEquals;
    public $RequireAudit_IsLike;
    public $RequireAudit_IsNotLike;
    public $RequireAudit_BeginsWith;
    public $RequireAudit_EndsWith;
    public $RequireAudit_GreaterThan;
    public $RequireAudit_GreaterThanOrEqual;
    public $RequireAudit_LessThan;
    public $RequireAudit_LessThanOrEqual;
    public $RequireAudit_In;
    public $RequireAudit_IsNotEmpty;
    public $RequireAudit_IsEmpty;
    public $RequireAudit_BitwiseOr;
    public $RequireAudit_BitwiseAnd;
    public $PendingAction_Equals;
    public $PendingAction_NotEquals;
    public $PendingAction_IsLike;
    public $PendingAction_IsNotLike;
    public $PendingAction_BeginsWith;
    public $PendingAction_EndsWith;
    public $PendingAction_GreaterThan;
    public $PendingAction_GreaterThanOrEqual;
    public $PendingAction_LessThan;
    public $PendingAction_LessThanOrEqual;
    public $PendingAction_In;
    public $PendingAction_IsNotEmpty;
    public $PendingAction_IsEmpty;
    public $PendingAction_BitwiseOr;
    public $PendingAction_BitwiseAnd;
    public $ActionTaken_Equals;
    public $ActionTaken_NotEquals;
    public $ActionTaken_IsLike;
    public $ActionTaken_IsNotLike;
    public $ActionTaken_BeginsWith;
    public $ActionTaken_EndsWith;
    public $ActionTaken_GreaterThan;
    public $ActionTaken_GreaterThanOrEqual;
    public $ActionTaken_LessThan;
    public $ActionTaken_LessThanOrEqual;
    public $ActionTaken_In;
    public $ActionTaken_IsNotEmpty;
    public $ActionTaken_IsEmpty;
    public $ActionTaken_BitwiseOr;
    public $ActionTaken_BitwiseAnd;
    public $Status_Equals;
    public $Status_NotEquals;
    public $Status_IsLike;
    public $Status_IsNotLike;
    public $Status_BeginsWith;
    public $Status_EndsWith;
    public $Status_GreaterThan;
    public $Status_GreaterThanOrEqual;
    public $Status_LessThan;
    public $Status_LessThanOrEqual;
    public $Status_In;
    public $Status_IsNotEmpty;
    public $Status_IsEmpty;
    public $Status_BitwiseOr;
    public $Status_BitwiseAnd;
    public $Narrative_Equals;
    public $Narrative_NotEquals;
    public $Narrative_IsLike;
    public $Narrative_IsNotLike;
    public $Narrative_BeginsWith;
    public $Narrative_EndsWith;
    public $Narrative_GreaterThan;
    public $Narrative_GreaterThanOrEqual;
    public $Narrative_LessThan;
    public $Narrative_LessThanOrEqual;
    public $Narrative_In;
    public $Narrative_IsNotEmpty;
    public $Narrative_IsEmpty;
    public $Narrative_BitwiseOr;
    public $Narrative_BitwiseAnd;
    public $TableAction_Equals;
    public $TableAction_NotEquals;
    public $TableAction_IsLike;
    public $TableAction_IsNotLike;
    public $TableAction_BeginsWith;
    public $TableAction_EndsWith;
    public $TableAction_GreaterThan;
    public $TableAction_GreaterThanOrEqual;
    public $TableAction_LessThan;
    public $TableAction_LessThanOrEqual;
    public $TableAction_In;
    public $TableAction_IsNotEmpty;
    public $TableAction_IsEmpty;
    public $TableAction_BitwiseOr;
    public $TableAction_BitwiseAnd;
    public $TableArgs_Equals;
    public $TableArgs_NotEquals;
    public $TableArgs_IsLike;
    public $TableArgs_IsNotLike;
    public $TableArgs_BeginsWith;
    public $TableArgs_EndsWith;
    public $TableArgs_GreaterThan;
    public $TableArgs_GreaterThanOrEqual;
    public $TableArgs_LessThan;
    public $TableArgs_LessThanOrEqual;
    public $TableArgs_In;
    public $TableArgs_IsNotEmpty;
    public $TableArgs_IsEmpty;
    public $TableArgs_BitwiseOr;
    public $TableArgs_BitwiseAnd;
    public $ActionUser_Equals;
    public $ActionUser_NotEquals;
    public $ActionUser_IsLike;
    public $ActionUser_IsNotLike;
    public $ActionUser_BeginsWith;
    public $ActionUser_EndsWith;
    public $ActionUser_GreaterThan;
    public $ActionUser_GreaterThanOrEqual;
    public $ActionUser_LessThan;
    public $ActionUser_LessThanOrEqual;
    public $ActionUser_In;
    public $ActionUser_IsNotEmpty;
    public $ActionUser_IsEmpty;
    public $ActionUser_BitwiseOr;
    public $ActionUser_BitwiseAnd;
    public $ActionTakenTime_Equals;
    public $ActionTakenTime_NotEquals;
    public $ActionTakenTime_IsLike;
    public $ActionTakenTime_IsNotLike;
    public $ActionTakenTime_BeginsWith;
    public $ActionTakenTime_EndsWith;
    public $ActionTakenTime_GreaterThan;
    public $ActionTakenTime_GreaterThanOrEqual;
    public $ActionTakenTime_LessThan;
    public $ActionTakenTime_LessThanOrEqual;
    public $ActionTakenTime_In;
    public $ActionTakenTime_IsNotEmpty;
    public $ActionTakenTime_IsEmpty;
    public $ActionTakenTime_BitwiseOr;
    public $ActionTakenTime_BitwiseAnd;
    public $Checksum_Equals;
    public $Checksum_NotEquals;
    public $Checksum_IsLike;
    public $Checksum_IsNotLike;
    public $Checksum_BeginsWith;
    public $Checksum_EndsWith;
    public $Checksum_GreaterThan;
    public $Checksum_GreaterThanOrEqual;
    public $Checksum_LessThan;
    public $Checksum_LessThanOrEqual;
    public $Checksum_In;
    public $Checksum_IsNotEmpty;
    public $Checksum_IsEmpty;
    public $Checksum_BitwiseOr;
    public $Checksum_BitwiseAnd;
    public $Title_Equals;
    public $Title_NotEquals;
    public $Title_IsLike;
    public $Title_IsNotLike;
    public $Title_BeginsWith;
    public $Title_EndsWith;
    public $Title_GreaterThan;
    public $Title_GreaterThanOrEqual;
    public $Title_LessThan;
    public $Title_LessThanOrEqual;
    public $Title_In;
    public $Title_IsNotEmpty;
    public $Title_IsEmpty;
    public $Title_BitwiseOr;
    public $Title_BitwiseAnd;
    public $Fname_Equals;
    public $Fname_NotEquals;
    public $Fname_IsLike;
    public $Fname_IsNotLike;
    public $Fname_BeginsWith;
    public $Fname_EndsWith;
    public $Fname_GreaterThan;
    public $Fname_GreaterThanOrEqual;
    public $Fname_LessThan;
    public $Fname_LessThanOrEqual;
    public $Fname_In;
    public $Fname_IsNotEmpty;
    public $Fname_IsEmpty;
    public $Fname_BitwiseOr;
    public $Fname_BitwiseAnd;
    public $Lname_Equals;
    public $Lname_NotEquals;
    public $Lname_IsLike;
    public $Lname_IsNotLike;
    public $Lname_BeginsWith;
    public $Lname_EndsWith;
    public $Lname_GreaterThan;
    public $Lname_GreaterThanOrEqual;
    public $Lname_LessThan;
    public $Lname_LessThanOrEqual;
    public $Lname_In;
    public $Lname_IsNotEmpty;
    public $Lname_IsEmpty;
    public $Lname_BitwiseOr;
    public $Lname_BitwiseAnd;
    public $Mname_Equals;
    public $Mname_NotEquals;
    public $Mname_IsLike;
    public $Mname_IsNotLike;
    public $Mname_BeginsWith;
    public $Mname_EndsWith;
    public $Mname_GreaterThan;
    public $Mname_GreaterThanOrEqual;
    public $Mname_LessThan;
    public $Mname_LessThanOrEqual;
    public $Mname_In;
    public $Mname_IsNotEmpty;
    public $Mname_IsEmpty;
    public $Mname_BitwiseOr;
    public $Mname_BitwiseAnd;
    public $Dob_Equals;
    public $Dob_NotEquals;
    public $Dob_IsLike;
    public $Dob_IsNotLike;
    public $Dob_BeginsWith;
    public $Dob_EndsWith;
    public $Dob_GreaterThan;
    public $Dob_GreaterThanOrEqual;
    public $Dob_LessThan;
    public $Dob_LessThanOrEqual;
    public $Dob_In;
    public $Dob_IsNotEmpty;
    public $Dob_IsEmpty;
    public $Dob_BitwiseOr;
    public $Dob_BitwiseAnd;
    public $Ss_Equals;
    public $Ss_NotEquals;
    public $Ss_IsLike;
    public $Ss_IsNotLike;
    public $Ss_BeginsWith;
    public $Ss_EndsWith;
    public $Ss_GreaterThan;
    public $Ss_GreaterThanOrEqual;
    public $Ss_LessThan;
    public $Ss_LessThanOrEqual;
    public $Ss_In;
    public $Ss_IsNotEmpty;
    public $Ss_IsEmpty;
    public $Ss_BitwiseOr;
    public $Ss_BitwiseAnd;
    public $Street_Equals;
    public $Street_NotEquals;
    public $Street_IsLike;
    public $Street_IsNotLike;
    public $Street_BeginsWith;
    public $Street_EndsWith;
    public $Street_GreaterThan;
    public $Street_GreaterThanOrEqual;
    public $Street_LessThan;
    public $Street_LessThanOrEqual;
    public $Street_In;
    public $Street_IsNotEmpty;
    public $Street_IsEmpty;
    public $Street_BitwiseOr;
    public $Street_BitwiseAnd;
    public $PostalCode_Equals;
    public $PostalCode_NotEquals;
    public $PostalCode_IsLike;
    public $PostalCode_IsNotLike;
    public $PostalCode_BeginsWith;
    public $PostalCode_EndsWith;
    public $PostalCode_GreaterThan;
    public $PostalCode_GreaterThanOrEqual;
    public $PostalCode_LessThan;
    public $PostalCode_LessThanOrEqual;
    public $PostalCode_In;
    public $PostalCode_IsNotEmpty;
    public $PostalCode_IsEmpty;
    public $PostalCode_BitwiseOr;
    public $PostalCode_BitwiseAnd;
    public $City_Equals;
    public $City_NotEquals;
    public $City_IsLike;
    public $City_IsNotLike;
    public $City_BeginsWith;
    public $City_EndsWith;
    public $City_GreaterThan;
    public $City_GreaterThanOrEqual;
    public $City_LessThan;
    public $City_LessThanOrEqual;
    public $City_In;
    public $City_IsNotEmpty;
    public $City_IsEmpty;
    public $City_BitwiseOr;
    public $City_BitwiseAnd;
    public $State_Equals;
    public $State_NotEquals;
    public $State_IsLike;
    public $State_IsNotLike;
    public $State_BeginsWith;
    public $State_EndsWith;
    public $State_GreaterThan;
    public $State_GreaterThanOrEqual;
    public $State_LessThan;
    public $State_LessThanOrEqual;
    public $State_In;
    public $State_IsNotEmpty;
    public $State_IsEmpty;
    public $State_BitwiseOr;
    public $State_BitwiseAnd;
    public $Referrerid_Equals;
    public $Referrerid_NotEquals;
    public $Referrerid_IsLike;
    public $Referrerid_IsNotLike;
    public $Referrerid_BeginsWith;
    public $Referrerid_EndsWith;
    public $Referrerid_GreaterThan;
    public $Referrerid_GreaterThanOrEqual;
    public $Referrerid_LessThan;
    public $Referrerid_LessThanOrEqual;
    public $Referrerid_In;
    public $Referrerid_IsNotEmpty;
    public $Referrerid_IsEmpty;
    public $Referrerid_BitwiseOr;
    public $Referrerid_BitwiseAnd;
    public $Providerid_Equals;
    public $Providerid_NotEquals;
    public $Providerid_IsLike;
    public $Providerid_IsNotLike;
    public $Providerid_BeginsWith;
    public $Providerid_EndsWith;
    public $Providerid_GreaterThan;
    public $Providerid_GreaterThanOrEqual;
    public $Providerid_LessThan;
    public $Providerid_LessThanOrEqual;
    public $Providerid_In;
    public $Providerid_IsNotEmpty;
    public $Providerid_IsEmpty;
    public $Providerid_BitwiseOr;
    public $Providerid_BitwiseAnd;
    public $RefProviderid_Equals;
    public $RefProviderid_NotEquals;
    public $RefProviderid_IsLike;
    public $RefProviderid_IsNotLike;
    public $RefProviderid_BeginsWith;
    public $RefProviderid_EndsWith;
    public $RefProviderid_GreaterThan;
    public $RefProviderid_GreaterThanOrEqual;
    public $RefProviderid_LessThan;
    public $RefProviderid_LessThanOrEqual;
    public $RefProviderid_In;
    public $RefProviderid_IsNotEmpty;
    public $RefProviderid_IsEmpty;
    public $RefProviderid_BitwiseOr;
    public $RefProviderid_BitwiseAnd;
    public $Pubpid_Equals;
    public $Pubpid_NotEquals;
    public $Pubpid_IsLike;
    public $Pubpid_IsNotLike;
    public $Pubpid_BeginsWith;
    public $Pubpid_EndsWith;
    public $Pubpid_GreaterThan;
    public $Pubpid_GreaterThanOrEqual;
    public $Pubpid_LessThan;
    public $Pubpid_LessThanOrEqual;
    public $Pubpid_In;
    public $Pubpid_IsNotEmpty;
    public $Pubpid_IsEmpty;
    public $Pubpid_BitwiseOr;
    public $Pubpid_BitwiseAnd;
    public $CareTeam_Equals;
    public $CareTeam_NotEquals;
    public $CareTeam_IsLike;
    public $CareTeam_IsNotLike;
    public $CareTeam_BeginsWith;
    public $CareTeam_EndsWith;
    public $CareTeam_GreaterThan;
    public $CareTeam_GreaterThanOrEqual;
    public $CareTeam_LessThan;
    public $CareTeam_LessThanOrEqual;
    public $CareTeam_In;
    public $CareTeam_IsNotEmpty;
    public $CareTeam_IsEmpty;
    public $CareTeam_BitwiseOr;
    public $CareTeam_BitwiseAnd;
    public $Username_Equals;
    public $Username_NotEquals;
    public $Username_IsLike;
    public $Username_IsNotLike;
    public $Username_BeginsWith;
    public $Username_EndsWith;
    public $Username_GreaterThan;
    public $Username_GreaterThanOrEqual;
    public $Username_LessThan;
    public $Username_LessThanOrEqual;
    public $Username_In;
    public $Username_IsNotEmpty;
    public $Username_IsEmpty;
    public $Username_BitwiseOr;
    public $Username_BitwiseAnd;
    public $Authorized_Equals;
    public $Authorized_NotEquals;
    public $Authorized_IsLike;
    public $Authorized_IsNotLike;
    public $Authorized_BeginsWith;
    public $Authorized_EndsWith;
    public $Authorized_GreaterThan;
    public $Authorized_GreaterThanOrEqual;
    public $Authorized_LessThan;
    public $Authorized_LessThanOrEqual;
    public $Authorized_In;
    public $Authorized_IsNotEmpty;
    public $Authorized_IsEmpty;
    public $Authorized_BitwiseOr;
    public $Authorized_BitwiseAnd;
    public $Ufname_Equals;
    public $Ufname_NotEquals;
    public $Ufname_IsLike;
    public $Ufname_IsNotLike;
    public $Ufname_BeginsWith;
    public $Ufname_EndsWith;
    public $Ufname_GreaterThan;
    public $Ufname_GreaterThanOrEqual;
    public $Ufname_LessThan;
    public $Ufname_LessThanOrEqual;
    public $Ufname_In;
    public $Ufname_IsNotEmpty;
    public $Ufname_IsEmpty;
    public $Ufname_BitwiseOr;
    public $Ufname_BitwiseAnd;
    public $Umname_Equals;
    public $Umname_NotEquals;
    public $Umname_IsLike;
    public $Umname_IsNotLike;
    public $Umname_BeginsWith;
    public $Umname_EndsWith;
    public $Umname_GreaterThan;
    public $Umname_GreaterThanOrEqual;
    public $Umname_LessThan;
    public $Umname_LessThanOrEqual;
    public $Umname_In;
    public $Umname_IsNotEmpty;
    public $Umname_IsEmpty;
    public $Umname_BitwiseOr;
    public $Umname_BitwiseAnd;
    public $Ulname_Equals;
    public $Ulname_NotEquals;
    public $Ulname_IsLike;
    public $Ulname_IsNotLike;
    public $Ulname_BeginsWith;
    public $Ulname_EndsWith;
    public $Ulname_GreaterThan;
    public $Ulname_GreaterThanOrEqual;
    public $Ulname_LessThan;
    public $Ulname_LessThanOrEqual;
    public $Ulname_In;
    public $Ulname_IsNotEmpty;
    public $Ulname_IsEmpty;
    public $Ulname_BitwiseOr;
    public $Ulname_BitwiseAnd;
    public $Facility_Equals;
    public $Facility_NotEquals;
    public $Facility_IsLike;
    public $Facility_IsNotLike;
    public $Facility_BeginsWith;
    public $Facility_EndsWith;
    public $Facility_GreaterThan;
    public $Facility_GreaterThanOrEqual;
    public $Facility_LessThan;
    public $Facility_LessThanOrEqual;
    public $Facility_In;
    public $Facility_IsNotEmpty;
    public $Facility_IsEmpty;
    public $Facility_BitwiseOr;
    public $Facility_BitwiseAnd;
    public $Active_Equals;
    public $Active_NotEquals;
    public $Active_IsLike;
    public $Active_IsNotLike;
    public $Active_BeginsWith;
    public $Active_EndsWith;
    public $Active_GreaterThan;
    public $Active_GreaterThanOrEqual;
    public $Active_LessThan;
    public $Active_LessThanOrEqual;
    public $Active_In;
    public $Active_IsNotEmpty;
    public $Active_IsEmpty;
    public $Active_BitwiseOr;
    public $Active_BitwiseAnd;
    public $Utitle_Equals;
    public $Utitle_NotEquals;
    public $Utitle_IsLike;
    public $Utitle_IsNotLike;
    public $Utitle_BeginsWith;
    public $Utitle_EndsWith;
    public $Utitle_GreaterThan;
    public $Utitle_GreaterThanOrEqual;
    public $Utitle_LessThan;
    public $Utitle_LessThanOrEqual;
    public $Utitle_In;
    public $Utitle_IsNotEmpty;
    public $Utitle_IsEmpty;
    public $Utitle_BitwiseOr;
    public $Utitle_BitwiseAnd;
    public $PhysicianType_Equals;
    public $PhysicianType_NotEquals;
    public $PhysicianType_IsLike;
    public $PhysicianType_IsNotLike;
    public $PhysicianType_BeginsWith;
    public $PhysicianType_EndsWith;
    public $PhysicianType_GreaterThan;
    public $PhysicianType_GreaterThanOrEqual;
    public $PhysicianType_LessThan;
    public $PhysicianType_LessThanOrEqual;
    public $PhysicianType_In;
    public $PhysicianType_IsNotEmpty;
    public $PhysicianType_IsEmpty;
    public $PhysicianType_BitwiseOr;
    public $PhysicianType_BitwiseAnd;
}
