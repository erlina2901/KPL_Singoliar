<policyDefinitionResources revision="1.0" schemaVersion="1.0">
  <displayName>enter display name here</displayName>
  <description>enter description here</description>
  <resources>
    <stringTable>
      <string id="ELAMCategory">Early Launch Antimalware</string>
      <string id="POL_DriverLoadPolicy_Name">Boot-Start Driver Initialization Policy</string>
      <string id="POL_DriverLoadPolicy_Name_Help">This policy setting allows you to specify which boot-start drivers are initialized based on a classification determined by an Early Launch Antimalware boot-start driver. The Early Launch Antimalware boot-start driver can return the following classifications for each boot-start driver:
-  Good: The driver has been signed and has not been tampered with.
-  Bad: The driver has been identified as malware. It is recommended that you do not allow known bad drivers to be initialized.
-  Bad, but required for boot: The driver has been identified as malware, but the computer cannot successfully boot without loading this driver.
-  Unknown: This driver has not been attested to by your malware detection application and has not been classified by the Early Launch Antimalware boot-start driver.

If you enable this policy setting you will be able to choose which boot-start drivers to initialize the next time the computer is started.

If you disable or do not configure this policy setting, the boot start drivers determined to be Good, Unknown or Bad but Boot Critical are initialized and the initialization of drivers determined to be Bad is skipped.

If your malware detection application does not include an Early Launch Antimalware boot-start driver or if your Early Launch Antimalware boot-start driver has been disabled, this setting has no effect and all boot-start drivers are initialized.
      </string>
      <string id="SelectDriverLoadPolicy-GoodOnly">Good only</string>
      <string id="SelectDriverLoadPolicy-GoodPlusUnknown">Good and unknown</string>
      <string id="SelectDriverLoadPolicy-GoodPlusUnknownPlusKnownBadCritical">Good, unknown and bad but critical</string>
      <string id="SelectDriverLoadPolicy-All">All</string>
    </stringTable>
    <presentationTable>
      <presentation id="POL_DriverLoadPolicy_Name">        
        <dropdownList refId="SelectDriverLoadPolicy" defaultItem="2" noSort="true">Choose the boot-start drivers that can be initialized:</dropdownList>
      </presentation>
    </presentationTable>
  </resources>
</policyDefinitionResources>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                          