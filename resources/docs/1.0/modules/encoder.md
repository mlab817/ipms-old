# Encoders

---

- [1. Create New PAP Module](#create)
- [2. View/Update Projects Module](#reviewer)
- [3. TRIP Module](#trip)

<a name="create"></a>
## 1. Create New PAP Module

> {primary} This module is accessible only to users with roles main focal and alternate focal or users with permission projects.create.

See Annex A for details on PIP Data Requirements and Definition

<a name="view"></a>
## 2. View/Update Projects Module

The View Projects Module has two modes: “Office Project” and “Own Project” mode. The Office Project mode shows all the PAPs added by users that belong to the same office. Own Project mode, on the other hand, shows only the PAPs added by the current user.
Users with permission `projects.view_own` can access the Own Projects mode while users with permission `projects.view_office` can
view Office Projects. Users can also have both permissions.

![Own Projects](/images/screenshots/projects/index.png)

![Office Projects](/images/screenshots/projects/index-office.png)

The View Projects module also provides access to the `View/Update` functionality as well as the `TRIP` button
to update the TRIP profile.

_Note on office ownership: The owning office is automatically determined by the office the user is currently assigned to. Thus, if the user changes office affiliation, they may not be able to view these projects in the Office mode. Changing the user's office can therefore bring undesired side effects._

<a name="trip"></a>
## 3. TRIP Module

> {primary} The TRIP module allows for a separate encoding of data related to the infrastructure profile of PAPs.

The TRIP module becomes available if the user ticks the “Does this PAP have INFRASTRUCTURE component/s?” while creating/ updating the PAP. This, however, does not automatically qualify the PAP into the TRIP but flags the reviewer (IPD) that the PAP is a potential TRIP PAP. The user must complete the TRIP profile for the PAP to qualify for TRIP. See Annex B for TRIP Data Requirements and Definition.

![TRIP Profile](/images/screenshots/projects/trip/1.png)
