# Register Modal Update Plan - Version 2

## Objective
Update the register modal to fix remaining issues:
1. Remove "Pertencente a que Produtora" field for normal users
2. Increase modal width and improve field layout
3. Enhance visual error feedback with red outline stroke

## Current Issues Analysis
Based on the previous implementation, the following issues need to be addressed:
- The "Pertencente a que Produtora" field is still present but not relevant for normal users
- Modal width needs to be increased for better layout
- Fields need to be organized in a 2-column layout
- Error styling needs improvement for better visibility

## Implementation Plan

### Phase 1: Remove Produtora Field
1. **Remove the produtora field** from the HTML form in `index.php`
2. **Update backend processing** to remove produtora parameter
3. **Remove related JavaScript** for produtora validation

### Phase 2: Improve Modal Layout and Width
1. **Increase modal width** to accommodate 2-column layout
2. **Implement 2-column grid layout**:
   - **Left Column**: Login, Email, Password & Confirm Password (same row)
   - **Right Column**: Name, Birth Date
3. **Ensure proper spacing** between columns and rows
4. **Maintain responsive design** for mobile devices

### Phase 3: Enhance Error Visual Feedback
1. **Update CSS styling** for error states:
   - Add prominent red outline/stroke for invalid fields
   - Ensure error styling is highly visible
   - Maintain consistency with Bootstrap validation classes
2. **Improve error message positioning** and readability
3. **Test error states** to ensure they're easily identifiable

### Phase 4: Backend Updates
1. **Update database insertion** to remove produtora field
2. **Remove produtora validation** from JavaScript
3. **Test the registration flow** with simplified form

## Files to Modify

### Primary Files:
- `index.php` - Remove produtora field and implement 2-column layout
- `css/my.css` - Add styling for wider modal and improved error states
- `js/valida.js` - Remove produtora validation logic
- `files/REGlog/regi.php` - Remove produtora field from database insertion

### Layout Structure:
```
┌─────────────────────────────────────────────────────────┐
│                    Registration Modal                    │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  ┌─────────────┐  ┌─────────────┐                      │
│  │   Login     │  │    Name     │                      │
│  │             │  │             │                      │
│  └─────────────┘  └─────────────┘                      │
│                                                         │
│  ┌─────────────┐  ┌─────────────┐                      │
│  │   Email     │  │ Birth Date  │                      │
│  │             │  │             │                      │
│  └─────────────┘  └─────────────┘                      │
│                                                         │
│  ┌─────────────────────────────────────────────────────┐ │
│  │              Password    Confirm Password           │ │
│  │                                                     │ │
│  └─────────────────────────────────────────────────────┘ │
│                                                         │
│  ┌─────────────────────────────────────────────────────┐ │
│  │                    [Register] [Close]               │ │
│  └─────────────────────────────────────────────────────┘ │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

## Success Criteria
1. ✅ "Pertencente a que Produtora" field completely removed
2. ✅ Modal width increased to accommodate 2-column layout
3. ✅ Fields organized in proper 2-column grid layout
4. ✅ Password and confirm password fields on same row
5. ✅ Error states show prominent red outline/stroke
6. ✅ Form maintains all existing functionality except produtora
7. ✅ Responsive design works across different screen sizes
8. ✅ Form validation works correctly without produtora validation

## Implementation Notes
- Ensure the modal width is responsive and doesn't break on smaller screens
- Use Bootstrap's grid system for proper 2-column layout
- Maintain consistent spacing and alignment
- Test error states thoroughly to ensure visibility
- Keep the registration process simple and intuitive
- Use consistent styling with the rest of the application