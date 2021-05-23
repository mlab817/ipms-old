# Modules

---

- [I. Encoder](#encoder)
- [II. Reviewer](#reviewer)
- [III. Admin](#admin)
- [IV. Other Features](#other)

<a name="encoder"></a>
## I. Encoder

### 1. Create New PAP Module
   
> {primary} This module is accessible only to users with roles main focal and alternate focal or users with permission projects.create.
   
See Annex A for details on PIP Data Requirements and Definition

### 2. View/Update Projects Module

The View Projects Module has two modes: “Office Project” and “Own Project” mode. The Office Project mode shows all the PAPs added by users that belong to the same office. Own Project mode, on the other hand, shows only the PAPs added by the current user.

_Note on office ownership: The owning office is automatically determined by the office the user is currently assigned to. Thus, if the user changes office affiliation, they may not be able to view these projects in the Office mode. Changing the user's office can therefore bring undesired side effects._

### 3. TRIP Module

The TRIP module becomes available if the user ticks the “Does this PAP have INFRASTRUCTURE component/s?” while creating/ updating the PAP. This, however, does not automatically qualify the PAP into the TRIP but flags the reviewer (IPD) that the PAP is a potential TRIP PAP. The user must complete the TRIP profile for the PAP to qualify for TRIP. See Annex B for TRIP Data Requirements and Definition.

> {primary} The TRIP module allows for a separate encoding of data related to the infrastructure profile of PAPs.

<a name="reviewer"></a>
## II. Reviewer

The Review PAP module allows the IPD to properly assess and categorize PAPs encoded in the System if they qualify to be included in PIP and TRIP. It is only accessible by users with roles as __main reviewer__ and __reviewer__ or users with permission __reviews.create__. It also allows IPD to track status of the PAP in the PIPOL System as well as other information such as URL in the PIPOL and PIPOL Code.

![Reviewer Module](/images/screenshots/reviewer/reviews/index.png)
![Create Review Module](/images/screenshots/reviewer/reviews/create.png)

To facilitate transfer of data from IPMS version 1 to the new system,
IPMS v2 has a function Import Project Module shown below. To copy data
from version 1 to the new version, the user just have to determine and
input the ID of the project from the old System. Only users with `projects.import`
permission can access this functionality.

![Import Projects Module](/images/screenshots/projects/import/index.png)

Upon inputting the ID, the `ProjectImportJob` will be triggered and added to the queue. 
The job will check for a project with the given ID and copy the data into the v2. 
The user that triggered the import will be the creator for the imported PAP. The user
will receive a `DatabaseNotification` on whether the import job was successful or not.

## III. Admin

One of the functionalities strengthened in v2 is the admin capabilities. The v2 adds the ability to manage libraries (those that appear in dropdown and checkboxes) through a user interface. It also adds the ability to create users, roles, and permissions. Audit logs have also been added to track changes made to database entries. Admin can also manage projects by changing their owner and giving restricted access to other users who otherwise have no access to the PAP by default.

### A. Manage Projects Module

![Manage Projects Module](/images/screenshots/admin/manage-projects.png)
![Manage Project](/images/screenshots/admin/manage-project-access.png)
![Manage Project](/images/screenshots/admin/manage-project-add-user.png)
![Manage Project](/images/screenshots/admin/manage-project-change-owner.png)

### B. Manage Users Module

The Manage Users Module allows the admin to create users that can access the system.

![Manage Users](/images/screenshots/admin/manage-users.png)

The Add User feature allows the creation of new users. It requires a name, email, and office. Note that email cannot be changed once it is registered; thus, be sure to require valid email when registering users as emails are linked to vital security features of the System.

Upon creation, the admin may choose to activate the user account right away or defer activation (using the Edit User page later). The admin also needs to assign role/s to the user and/or permissions. Note that any permission selected will be added to the existing permissions of the role they belong to.
Upon creation, the user will receive an email notification containing their username (email) and auto-generated password. Upon first login, users will be asked to change this auto-generated password; otherwise, they will not be able to use the system.

_Note: This is also the reason why the user needs to provide a valid email. If the email they provided is invalid or they have no access to the email, they will not be able to retrieve the auto-generated password. The system also does not store the auto-generated password and thus the only way to retrieve it is using a valid email._

![Add User](/images/screenshots/admin/manage-users-add.png)

![Edit User](/images/screenshots/admin/manage-users-edit.png)

### C. Manage Teams Module

Deferred implementation


### D. Manage Roles Module

Roles can be managed through the Manage Roles Module. Roles by themselves do not mean much for the system but they are useful in grouping permissions, i.e. it makes it easier to standardize permissions assigned to users. The application ships with five default roles shown below:

| Role | Description |
|------|-------------|
| Admin | Admin users have access to the following admin features: Manage Projects, Manage Users, Manage Teams, Manage Roles, Manage Permissions, Manage Libraries, and Audit Logs |
| Main Focal | Similar permissions to alternate focal with the addition of updating and deleting PAPs owned by the office. |
| Alternate Focal | Can create, view, update and delete own PAPs. |
| Main Reviewer | Similar permissions to reviewer but has additional ability to create, view, update and delete other reviews. |
| Reviewer | Can create, view, update and delete own reviews. Reviewers can also view, update and delete any PAPs. |

![Manage Roles](/images/screenshots/admin/manage-roles.png)

![Add Roles](/images/screenshots/admin/manage-roles-add.png)

![Edit Roles](/images/screenshots/admin/manage-roles-edit.png)

The roles can be edited, making it possible to add/remove permissions, e.g. just remove projects.create from focal role to remove all focals’ ability to create new PAPs. 

### E. Manage Permissions

Permissions define what users see and can access in the System. As such, this is also an application-level feature. To avoid messing with the System, the create feature has been disabled. Likewise, for Edit Permission, only the description is allowed to be edited.

![Manage Roles](/images/screenshots/admin/manage-permissions.png)

![Edit Roles](/images/screenshots/admin/manage-permissions-edit.png)

### F. Manage Libraries

The Manage Libraries Module allows the admin to add, edit and delete options from dropdowns and checkboxes in the Project, TRIP, and Review Modules. This should make the System more maintainable and more adaptable to changes in the PIPOL System. 

![Manage Libraries](/images/screenshots/admin/index.png)

### G. Audit Logs

The Audit Logs Module allows the admin to view the changes made in the database by users. Audit Logs are automatically generated by the System and therefore cannot be created manually or updated. They can also not be deleted.

![Audit Logs](/images/screenshots/admin/audit-logs-index.png)

![Sample Audit Logs](/images/screenshots/admin/audit-logs-view.png)

## IV. Other Features

### 1.Settings

The Settings Page allows the current user to view his/her profile and the roles and permissions they have. The page also allows the user to change his/her password.

### 2. Full Screen

The System can be shown in Full Screen mode by pressing the  at the top right of the screen. Exit Full Screen can be done by pressing ESC on the keyboard or clicking the button again.

### 3. Notifications

Notifications provide a way to inform users of actions/activities in the System. This can be accessed by pressing the  button. The System currently has a growing list of notifications but some that were already developed are:

| Notification                      | Description (including channels) |
|-----------------------------------|----------------------------------|
| Notify User of Project Reviewed   | Owners of a PAP will receive a notification that their PAP has been reviewed. |
| Notify Admin of Project Created   | Notifies admin that a focal has added a project. |
| Password Changed                  | Users will receive an email if their password has been changed. |
| Project Deleted                   | Notifies the owner that their project has been deleted |
| Project Owner Change              | Notifies user that the project they own has been given to another |
| User Deleted                      | Sends an email to user that their account has been deleted |
| User Updated                      | Notifies user that their information has been updated |
