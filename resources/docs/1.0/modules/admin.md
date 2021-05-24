# Admin

---

- [1. Manage Projects Module](#projects)
- [2. Manage Users Module](#users)
- [3. Manage Teams Module](#teams)
- [4. Manage Roles Module](#roles)
- [5. Manage Permissions Module](#roles)
- [6. Manage Libraries Module](#libraries)
- [7. Audit Logs](#audit-logs)
- [8. Export Data](#export)

One of the functionalities strengthened in v2 is the admin capabilities. The v2 adds the ability to manage libraries (those that appear in dropdown and checkboxes) through a user interface. It also adds the ability to create users, roles, and permissions. Audit logs have also been added to track changes made to database entries. Admin can also manage projects by changing their owner and giving restricted access to other users who otherwise have no access to the PAP by default.

<a name="projects"></a>
## 1. Manage Projects Module

![Manage Projects Module](/images/screenshots/admin/manage-projects.png)
![Manage Project](/images/screenshots/admin/manage-project-access.png)
![Manage Project](/images/screenshots/admin/manage-project-add-user.png)
![Manage Project](/images/screenshots/admin/manage-project-change-owner.png)

<a name="users"></a>
## 2. Manage Users Module

The Manage Users Module allows the admin to create users that can access the system.

![Manage Users](/images/screenshots/admin/manage-users.png)

The Add User feature allows the creation of new users. It requires a name, email, and office. Note that email cannot be changed once it is registered; thus, be sure to require valid email when registering users as emails are linked to vital security features of the System.

Upon creation, the admin may choose to activate the user account right away or defer activation (using the Edit User page later). The admin also needs to assign role/s to the user and/or permissions. Note that any permission selected will be added to the existing permissions of the role they belong to.
Upon creation, the user will receive an email notification containing their username (email) and auto-generated password. Upon first login, users will be asked to change this auto-generated password; otherwise, they will not be able to use the system.

_Note: This is also the reason why the user needs to provide a valid email. If the email they provided is invalid or they have no access to the email, they will not be able to retrieve the auto-generated password. The system also does not store the auto-generated password and thus the only way to retrieve it is using a valid email._

![Add User](/images/screenshots/admin/manage-users-add.png)

![Edit User](/images/screenshots/admin/manage-users-edit.png)

<a name="teams"></a>
### 3. Manage Teams Module

Deferred implementation

<a name="roles"></a>
### 4. Manage Roles Module

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

<a name="permissions"></a>
### 5. Manage Permissions Module

Permissions define what users see and can access in the System. As such, this is also an application-level feature. To avoid messing with the System, the create feature has been disabled. Likewise, for Edit Permission, only the description is allowed to be edited.

![Manage Roles](/images/screenshots/admin/manage-permissions.png)

![Edit Roles](/images/screenshots/admin/manage-permissions-edit.png)

<a name="libraries"></a>
### 6. Manage Libraries Module

The Manage Libraries Module allows the admin to add, edit and delete options from dropdowns and checkboxes in the Project, TRIP, and Review Modules. This should make the System more maintainable and more adaptable to changes in the PIPOL System.

![Manage Libraries](/images/screenshots/admin/index.png)

<a name="audit-logs"></a>
## 7. Audit Logs

The Audit Logs Module allows the admin to view the changes made in the database by users. Audit Logs are automatically generated by the System and therefore cannot be created manually or updated. They can also not be deleted.

![Audit Logs](/images/screenshots/admin/audit-logs-index.png)

![Sample Audit Logs](/images/screenshots/admin/audit-logs-view.png)

<a name="export"></a>
## 8. Export Data

