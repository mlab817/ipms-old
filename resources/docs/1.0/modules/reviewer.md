# Reviewer

---

- [1. Review PAPs Module](#review)
- [2. Import Projects Module](#import)

<a name="review"></a>
## 1. Review PAPs Module
The Review PAP module allows the IPD to properly assess and categorize PAPs encoded in the System if they qualify 
to be included in PIP and TRIP. It is only accessible by users with roles as __main reviewer__ and __reviewer__ or 
users with permission __reviews.create__. It also allows IPD to track status of the PAP in the PIPOL System as well 
as other information such as PIPOL Title, PIPOL URL, and PIPOL Code.

![Reviewer Module](/images/screenshots/reviewer/reviews/index.png)
![Create Review Module](/images/screenshots/reviewer/reviews/create.png)

<a name="import"></a>
## 2. Import Projects Module

To facilitate transfer of data from IPMS version 1 to the new system,
IPMS v2 has a function Import Project Module shown below. This can be accessed from the `Create New PAP Module`.
To copy data from version 1 to the new version, the user just have to determine and input the ID of the project 
from the old System. Only users with `projects.import`
permission can access this functionality.

![Import Projects Module](/images/screenshots/projects/import/index.png)

Upon inputting the ID, the `ProjectImportJob` will be triggered, added to the queue, and run 
in the background. The job will check for a project with the given ID and copy the data into 
the v2. Please note that this may take some time to execute. The user that triggered the import 
will be the creator for the imported PAP. The user will receive a `DatabaseNotification` on 
whether the import job was successful or not.

To view the imported project, you may access it via the View Own PAPs` module.
